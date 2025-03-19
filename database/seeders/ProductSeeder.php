<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'Name' => 'Laptop Dell XPS 13',
                'Description' => 'Intel Core i7, 16GB RAM, 512GB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 25990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop1.jpg',
                'Tag' => 'laptop,dell,xps',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'iPhone 15 Pro Max',
                'Description' => '256GB, Titanium Black',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 34990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/phone1.jpg',
                'Tag' => 'phone,apple,iphone',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'iPad Pro 12.9',
                'Description' => 'M2 chip, 256GB, WiFi',
                'CategoryId' => 3,
                'UserId' => 1,
                'Price' => 28990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/tablet1.jpg',
                'Tag' => 'tablet,apple,ipad',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'MacBook Pro 14',
                'Description' => 'M3 Pro, 18GB RAM, 512GB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 42990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop2.jpg',
                'Tag' => 'laptop,apple,macbook',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Samsung Galaxy S24 Ultra',
                'Description' => '256GB, Titanium Black',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 29990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/phone2.jpg',
                'Tag' => 'phone,samsung,galaxy',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Laptop HP Spectre x360',
                'Description' => 'Intel Core i7, 16GB RAM, 1TB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 32990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop3.jpg',
                'Tag' => 'laptop,hp,spectre',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Samsung Galaxy Tab S9 Ultra',
                'Description' => '14.6 inch, 256GB, WiFi',
                'CategoryId' => 3,
                'UserId' => 1,
                'Price' => 24990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/tablet2.jpg',
                'Tag' => 'tablet,samsung,galaxy',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'AirPods Pro 2',
                'Description' => 'USB-C, MagSafe Charging Case',
                'CategoryId' => 4,
                'UserId' => 1,
                'Price' => 6990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/accessories1.jpg',
                'Tag' => 'accessories,apple,airpods',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Laptop Lenovo ThinkPad X1 Carbon',
                'Description' => 'Intel Core i7, 16GB RAM, 1TB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 35990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop4.jpg',
                'Tag' => 'laptop,lenovo,thinkpad',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Google Pixel 8 Pro',
                'Description' => '256GB, Obsidian',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 27990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/phone3.jpg',
                'Tag' => 'phone,google,pixel',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'iPad Air 5',
                'Description' => 'M1 chip, 256GB, WiFi',
                'CategoryId' => 3,
                'UserId' => 1,
                'Price' => 19990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/tablet3.jpg',
                'Tag' => 'tablet,apple,ipad',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Samsung Galaxy Watch 6',
                'Description' => '44mm, LTE, Titanium Gray',
                'CategoryId' => 4,
                'UserId' => 1,
                'Price' => 8990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/accessories2.jpg',
                'Tag' => 'accessories,samsung,watch',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Laptop ASUS ROG Zephyrus',
                'Description' => 'AMD Ryzen 9, 32GB RAM, 1TB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 45990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop5.jpg',
                'Tag' => 'laptop,asus,rog',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'OnePlus 12',
                'Description' => '256GB, Flowy Emerald',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 19990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/phone4.jpg',
                'Tag' => 'phone,oneplus',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Xiaomi Pad 6 Pro',
                'Description' => '11 inch, 256GB, WiFi',
                'CategoryId' => 3,
                'UserId' => 1,
                'Price' => 15990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/tablet4.jpg',
                'Tag' => 'tablet,xiaomi,pad',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Apple Watch Series 9',
                'Description' => '45mm, GPS, Midnight',
                'CategoryId' => 4,
                'UserId' => 1,
                'Price' => 12990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/accessories3.jpg',
                'Tag' => 'accessories,apple,watch',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Laptop MSI Stealth 14',
                'Description' => 'Intel Core i9, 32GB RAM, 2TB SSD',
                'CategoryId' => 1,
                'UserId' => 1,
                'Price' => 49990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/laptop6.jpg',
                'Tag' => 'laptop,msi,stealth',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Nothing Phone 2',
                'Description' => '256GB, Dark Gray',
                'CategoryId' => 2,
                'UserId' => 1,
                'Price' => 15990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/phone5.jpg',
                'Tag' => 'phone,nothing',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Huawei MatePad Pro',
                'Description' => '12.6 inch, 256GB, WiFi',
                'CategoryId' => 3,
                'UserId' => 1,
                'Price' => 18990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/tablet5.jpg',
                'Tag' => 'tablet,huawei,matepad',
                'IsTagBlog' => false,
                'Count' => 0
            ],
            [
                'Name' => 'Sony WH-1000XM5',
                'Description' => 'Wireless Noise Cancelling Headphones',
                'CategoryId' => 4,
                'UserId' => 1,
                'Price' => 7990000,
                'IsPublish' => true,
                'Sale' => 0,
                'Image' => 'assets/images/products/accessories4.jpg',
                'Tag' => 'accessories,sony,headphones',
                'IsTagBlog' => false,
                'Count' => 0
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 