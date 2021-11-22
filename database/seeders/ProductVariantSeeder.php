<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductVariant::truncate();

        $variants = [
            [
                "product_id" => 1,
                "variant_name" => "4",
                "variant_category" => "size",
                "variant_value" => "4",
            ],
            [
                "product_id" => 1,
                "variant_name" => "4.5",
                "variant_category" => "size",
                "variant_value" => "4.5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "5",
                "variant_category" =>"size",
                "variant_value" => "5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "5.5",
                "variant_category" =>"size",
                "variant_value" => "5.5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "6",
                "variant_category" =>"size",
                "variant_value" => "6"
            ],
            [
                "product_id" => 1,
                "variant_name" => "6.5",
                "variant_category" =>"size",
                "variant_value" => "6.5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "7",
                "variant_category" =>"size",
                "variant_value" => "7"
            ],
            [
                "product_id" => 1,
                "variant_name" => "7.5",
                "variant_category" =>"size",
                "variant_value" => "7.5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "8",
                "variant_category" =>"size",
                "variant_value" => "8"
            ],
            [
                "product_id" => 1,
                "variant_name" => "8.5",
                "variant_category" =>"size",
                "variant_value" => "8.5"
            ],
            [
                "product_id" => 1,
                "variant_name" => "9",
                "variant_category" =>"size",
                "variant_value" => "9"
            ],
            [
                "product_id" => 1,
                "variant_name" => "9.5",
                "variant_category" =>"size",
                "variant_value" => "9.5"
            ]
        ];

        foreach ($variants as $variant) {
            ProductVariant::create($variant);
        }
    }
}
