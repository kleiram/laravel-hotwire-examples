<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductBarcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(10)->has(ProductBarcode::factory(5))->create();
    }
}
