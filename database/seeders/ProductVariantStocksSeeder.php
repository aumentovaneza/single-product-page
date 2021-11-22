<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use App\Models\ProductVariantStocks;
use Illuminate\Database\Seeder;

class ProductVariantStocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductVariantStocks::truncate();

        $variants = ProductVariant::all();

        foreach ($variants as $variant) {
            ProductVariantStocks::create([
                'product_id' => 1,
                'variant_id' => $variant->id,
                'quantity' => 5
            ]);
        }
    }
}
