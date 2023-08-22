<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __invoke(Client $client, UpdateClientRequest $request): RedirectResponse
    {
        // Update client name
        $client->fill($request->safe(['name']))->save();

        // The easiest way to update all items at once, it to
        // delete all existing items, then replace by the new items

        // Delete existing items for this client
        Item::where('client_id', $client->id)->delete();

        // Add new items
        $client->items()->saveMany(array_map(fn ($item) => new Item($item), $request->safe(['items'])['items']));

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
