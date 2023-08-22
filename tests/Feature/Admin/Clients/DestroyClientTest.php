<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Tests\FeatureTest;

class DestroyClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function aGuestCanDeleteAClient(): void
    {
        $client = Client::factory()->create();
        Item::factory(3)->create([
            'client_id' => $client->id,
        ]);

        $this->delete(route(RoutesEnum::ADMIN_DESTROY_CLIENT, ['client' => $client->id]))
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id,
        ]);
        $this->assertDatabaseMissing('items', [
            'client_id' => $client->id,
        ]);
    }
}
