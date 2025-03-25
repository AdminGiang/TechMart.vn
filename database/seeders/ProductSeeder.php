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
            ['name' => 'iPhone 16 Pro Max', 'description' => 'Điện thoại cao cấp của Apple', 'category_id' => 1, 'brand_id' => 1, 'price' => 32990000, 'discount' => 5, 'image' => 'iphone15promax.jpg', 'stock' => 50, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Samsung Galaxy S25 Ultra', 'description' => 'Flagship mạnh mẽ của Samsung', 'category_id' => 1, 'brand_id' => 2, 'price' => 28990000, 'discount' => 7, 'image' => 's23ultra.jpg', 'stock' => 40, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xiaomi 15 Pro', 'description' => 'Điện thoại camera Leica', 'category_id' => 1, 'brand_id' => 3, 'price' => 20990000, 'discount' => 10, 'image' => 'xiaomi13pro.jpg', 'stock' => 30, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Google Pixel 1 Pro', 'description' => 'Sản phẩm từ Google', 'category_id' => 1, 'brand_id' => 4, 'price' => 24990000, 'discount' => 6, 'image' => 'pixel7pro.jpg', 'stock' => 20, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'OnePlus 12', 'description' => 'Hiệu năng mạnh mẽ', 'category_id' => 1, 'brand_id' => 5, 'price' => 18990000, 'discount' => 8, 'image' => 'oneplus11.jpg', 'stock' => 25, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oppo Find X5 Pro', 'description' => 'Smartphone cao cấp từ Oppo', 'category_id' => 1, 'brand_id' => 6, 'price' => 22990000, 'discount' => 6, 'image' => 'oppofindx6pro.jpg', 'stock' => 35, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sony Xperia 3 V', 'description' => 'Điện thoại Sony cao cấp', 'category_id' => 1, 'brand_id' => 7, 'price' => 24990000, 'discount' => 5, 'image' => 'xperia1v.jpg', 'stock' => 15, 'warranty_period' => '12 tháng', 'stock_status' => 'in_stock', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
