<?php

declare(strict_types=1);

namespace Tests\Feature\Front\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Tests\FeatureTest;

class ShowClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a_guest_can_view_a_client_details_in_all_languages(): void
    {
        $client = Client::factory()->create();
        Item::factory(3)->create([
            'client_id' => $client->id,
        ]);

        foreach (config('app.locales') as $locale) {
            $response = $this->get(route(RoutesEnum::FRONT_SHOW_CLIENT, ['client' => $client->id, 'locale' => $locale]))
                ->assertOk();

            $response->assertSee($client->name);
            foreach ($client->items()->get() as $item) {
                $response->assertSee(__($item->type, [], $locale))
                    ->assertSee($item->getTranslation('title', $locale))
                    ->assertSee($item->getTranslation('paragraph', $locale));
            }
        }
    }
}
