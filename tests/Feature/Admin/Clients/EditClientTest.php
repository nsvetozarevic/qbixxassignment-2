<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class EditClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a_guest_can_view_edit_client_form(): void
    {
        $client = Client::factory()->create();
        $this->get(route(RoutesEnum::ADMIN_EDIT_CLIENT, ['client' => $client->id]))
            ->assertOk();
    }
}