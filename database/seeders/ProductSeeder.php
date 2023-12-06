<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Product 1',
                'price' => 19,
                'description' => 'Lorem ipsum...',
                'imageLink' => 'http://example.com/image1.jpg',
            ],
            [
                'title' => 'Product 2',
                'price' => 29,
                'description' => 'Lorem ipsum...',
                'imageLink' => 'http://example.com/image2.jpg',
            ],
            [
                'title' => 'Product 3',
                'price' => 39,
                'description' => 'Lorem ipsum...',
                'imageLink' => 'http://example.com/image3.jpg',
            ],
            [
                'title' => 'Product 4',
                'price' => 49,
                'description' => 'Lorem ipsum...',
                'imageLink' => 'http://example.com/image4.jpg',
            ],
            [
                'title' => 'Product 5',
                'price' => 59,
                'description' => 'Lorem ipsum...',
                'imageLink' => 'http://example.com/image5.jpg',
            ],
        ]);
    }
}
