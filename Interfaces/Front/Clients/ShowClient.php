<?php

declare(strict_types=1);

namespace Interfaces\Front\Clients;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        return Inertia::render('Front/Clients/Show', [
            'locales' => config('app.named_locales'),
            'client' => [
                'name' => $client->name,
            ],
            'items' => $client->items()->get()->map(fn ($item) => [
                'type' => $item->type,
                'title' => $item->title,
                'paragraph' => $item->paragraph,
            ]),
        ]);
    }
}
