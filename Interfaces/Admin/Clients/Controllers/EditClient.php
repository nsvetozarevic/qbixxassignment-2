<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Inertia\Inertia;
use Inertia\Response;

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        // For security reasons, we do not send all client data to the frontend
        return Inertia::render('Admin/Clients/Edit', [
            'locales' => config('app.named_locales'),
            'types' => Item::ALLOWED_TYPES,
            'client' => [
                'id' => $client->id,
                'name' => $client->name,
            ],
            'items' => $client->items()->get()->map(fn ($item) => [
                'type' => $item->type,
                'title' => $item->getTranslations('title'),
                'paragraph' => $item->getTranslations('paragraph'),
            ]),
        ]);
    }
}
