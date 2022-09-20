<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'productcode' => fake()->regexify('/[A-Z][A-Z][0-9]{6}/'),
            'amount_ordered' => fake()->numberBetween(1, 10),
            'amount' => fn (array $attrs) => fake()->optional()->numberBetween(0, $attrs['amount_ordered']) ?? 0,
        ];
    }
}
