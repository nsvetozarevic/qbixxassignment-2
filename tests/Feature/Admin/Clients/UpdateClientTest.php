<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a_guest_can_update_a_client(): void
    {
        $client = Client::factory()->create();
        Item::factory(3)->create([
            'client_id' => $client->id,
        ]);

        $formData = [
            'name' => 'New name',
            'items' => config('data.items'),
        ];

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $client->refresh();

        // Client name must be updated
        $this->assertSame('New name', $client->name);
        // Client must have exactly 3 items
        $this->assertCount(3, $client->items()->get());

        // All client items must be updated
        // Check all fields and all languages
        foreach ($client->items()->get() as $index => $item) {
            $this->assertSame(config('data.items')[$index]['type'], $item->type);
            foreach (config('app.locales') as $locale) {
                $this->assertSame(config('data.items')[$index]['title'][$locale], $item->getTranslation('title', $locale));
                $this->assertSame(config('data.items')[$index]['paragraph'][$locale], $item->getTranslation('paragraph', $locale));
            }
        }
    }

    /**
     * @test
     *
     * @dataProvider invalidData
     */
    public function a_guest_can_not_update_a_client_with_invalid_data(string $columnName, string $value): void
    {
        $client = Client::factory()->create();
        Item::factory(3)->create([
            'client_id' => $client->id,
        ]);

        $formData = [
            $columnName => $value,
        ];

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertSessionHasErrors($columnName);
    }

    public function invalidData(): array
    {
        return [
            'required' => ['name', ''],
            'min 4' => ['name', 'fre'],
            'max 30' => ['name', 'Do you know someone with a name longer than 30 characters?'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidItemData
     */
    public function a_guest_can_not_update_a_client_items_with_invalid_data(string $columnName, $value, string $sessionName): void
    {
        $client = Client::factory()->create();
        Item::factory(3)->create([
            'client_id' => $client->id,
        ]);

        $formData = [
            'items' => [
                [
                    $columnName => $value,
                ],
            ],
        ];

        $this->put(route(RoutesEnum::ADMIN_UPDATE_CLIENT, ['client' => $client->id]), $formData)
            ->assertSessionHasErrors($sessionName);
    }

    public function invalidItemData(): array
    {
        return [
            'type required' => ['type', '', 'items.0.type'],
            'only allowed types' => ['type', 'invalid-type', 'items.0.type'],
            'english title required' => ['title', ['en' => ''], 'items.0.title.en'],
            'dutch title required' => ['title', ['nl' => ''], 'items.0.title.nl'],
            'french title required' => ['title', ['fr' => ''], 'items.0.title.fr'],
            'english paragraph required' => ['paragraph', ['en' => ''], 'items.0.paragraph.en'],
            'dutch paragraph required' => ['paragraph', ['nl' => ''], 'items.0.paragraph.nl'],
            'french paragraph required' => ['paragraph', ['fr' => ''], 'items.0.paragraph.fr'],
        ];
    }
}
