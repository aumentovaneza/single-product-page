<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::create([
            'product_name' => "OFF-WHITE X AIR JORDAN 1 RETRO HIGH OG 'UNC'",
            'product_description' => "Inspired by the alma mater of Michael Jordan, the Off-White x Air Jordan 1 Retro High OG 'UNC' holds a classic structure of two tones, filtered through the distinctive design prism of Virgil Abloh. The method includes taking a white leather foundation with blue overlays of dark powder and adding embellishments that express an expressive, handmade value. They include separated wings, a floating Swoosh, and text lines on the quarter panel on the medial side delineating the shoe's taxonomy.",
            'base_price' => 192.00
        ]);
    }
}
