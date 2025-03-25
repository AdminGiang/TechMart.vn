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
                'Name' => 'Iphone 12 Pro Max',
                'Description' => 'Điện thoại iPhone 12 Pro Max 128GB',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 32990000,
                'IsPublish' => 1,
                'Sale' => 10,
                'Image' => 'iphone12promax.jpg',
                'Tag' => 'điện thoại, iPhone 12 Pro Max',
                'IsTagBlog' => 0,
                'Count' => 100,
                'SaleId' => 1,
            ],
        ]);
    }
}