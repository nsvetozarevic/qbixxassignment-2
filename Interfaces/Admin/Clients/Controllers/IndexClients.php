<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        // For security reasons, we do not send all client data to the frontend
        return Inertia::render('Admin/Clients/Index', [
            'clients' => Client::all()->map(fn($client) => [
                'id' => $client->id,
                'name' => $client->name,
            ])
        ]);
    }
}
