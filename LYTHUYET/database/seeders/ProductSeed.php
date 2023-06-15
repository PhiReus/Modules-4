<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'ABC',
            'price' => 200,
            'description' => 'San pham nay tot',
            'image' => 'abc',
            'user_id' => 1
        ];
        DB::table('products')->insert($data);
    }
}
