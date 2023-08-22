<?php

namespace Database\Factories;

use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Clients\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'type' => $this->faker->randomElement(Item::ALLOWED_TYPES),
            'title' => [
                'en' => $this->faker->text(),
                'nl' => $this->faker->text(),
                'fr' => $this->faker->text(),
            ],
            'paragraph' => [
                'en' => $this->faker->paragraph(),
                'nl' => $this->faker->paragraph(),
                'fr' => $this->faker->paragraph(),
            ],
        ];
    }
}
