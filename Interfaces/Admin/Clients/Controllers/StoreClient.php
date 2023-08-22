<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class StoreClient extends Controller
{
    public function __invoke(StoreClientRequest $request): RedirectResponse
    {
        $client = Client::create($request->safe(['name']));

        // Create client default items
        foreach (config('data.items') as $item) {
            Item::create(array_merge($item, ['client_id' => $client->id]));
        }

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
