<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Flagship mạnh mẽ của Apple với chip A17 Pro.',
                'category_id' => 1,
                'brand_id' => 1,
                'price' => 32990000,
                'discount' => 5,
                'image' => 'iphone15promax.jpg',
                'stock' => 50,
                'warranty_period' => '12 tháng',
                'stock_status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'MacBook Pro M3',
                'description' => 'Laptop mạnh mẽ với chip Apple M3.',
                'category_id' => 2,
                'brand_id' => 1,
                'price' => 49990000,
                'discount' => 10,
                'image' => 'macbookprom3.jpg',
                'stock' => 30,
                'warranty_period' => '24 tháng',
                'stock_status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'iPad Pro M2',
                'description' => 'Máy tính bảng hiệu năng cao với màn hình Liquid Retina.',
                'category_id' => 3,
                'brand_id' => 1,
                'price' => 29990000,
                'discount' => 8,
                'image' => 'ipadprom2.jpg',
                'stock' => 20,
                'warranty_period' => '12 tháng',
                'stock_status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'AirPods Pro 2',
                'description' => 'Tai nghe không dây chống ồn cao cấp của Apple.',
                'category_id' => 4,
                'brand_id' => 1,
                'price' => 7990000,
                'discount' => 5,
                'image' => 'airpodspro2.jpg',
                'stock' => 100,
                'warranty_period' => '12 tháng',
                'stock_status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'AirPods Pro 6',
                'description' => 'Tai nghe không dây chống ồn cao cấp của Apple.',
                'category_id' => 5,
                'brand_id' => 1,
                'price' => 7990000,
                'discount' => 5,
                'image' => 'airpodspro2.jpg',
                'stock' => 100,
                'warranty_period' => '12 tháng',
                'stock_status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
