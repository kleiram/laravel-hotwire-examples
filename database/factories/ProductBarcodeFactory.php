<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductBarcode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductBarcode>
 */
class ProductBarcodeFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barcode' => fake()->ean13(),
        ];
    }
}
