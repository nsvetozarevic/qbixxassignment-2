<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::factory(5)->has(Item::factory(3))->create();
    }
}
