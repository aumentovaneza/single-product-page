<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::truncate();

        $images = [
            [
                'product_id' => 1,
                'file_name' => '4.jpg',
                'file_path' => 'https://cdn.flightclub.com/3000/TEMPLATE/804093/4.jpg'
            ],
            [
                'product_id' => 1,
                'file_name' => '1.jpg',
                'file_path' => 'https://cdn.flightclub.com/3000/TEMPLATE/804093/1.jpg'
            ],
            [
                'product_id' => 1,
                'file_name' => '2.jpg',
                'file_path' => 'https://cdn.flightclub.com/3000/TEMPLATE/804093/2.jpg'
            ],
            [
                'product_id' => 1,
                'file_name' => '3.jpg',
                'file_path' => 'https://cdn.flightclub.com/3000/TEMPLATE/804093/3.jpg'
            ]
        ];

        foreach ($images as $image) {
            ProductImage::create($image);
        }
    }
}
