<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'This is product 1',
                'price' => 9.99,
            ],
            [
                'name' => 'Product 2',
                'description' => 'This is product 2',
                'price' => 19.99,
            ],
            // Thêm dữ liệu mẫu cho các sản phẩm khác...
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
