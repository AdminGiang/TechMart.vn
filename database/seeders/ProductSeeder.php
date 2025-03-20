<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            
            [
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 16 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 30000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'iphone.jpg',
                'tag' => 'điện thoại, iphone, 16 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 16 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 30000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'iphone.jpg',
                'tag' => 'điện thoại, iphone, 16 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ]
        ]);
    }
}