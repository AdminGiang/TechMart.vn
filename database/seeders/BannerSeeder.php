<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use Illuminate\Support\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'iPhone 15 Pro Max - Giảm Giá Đặc Biệt',
                'description' => 'Sở hữu ngay iPhone 15 Pro Max với giá ưu đãi!',
                'image' => 'banners/iphone15promax.jpg',
                'link' => 'https://example.com/iphone15promax',
                'position' => 'top',
                'status' => 'active',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
            ],
            [
                'title' => 'iPhone 14 Giảm Giá Cực Sốc',
                'description' => 'Mua ngay iPhone 14 với giá tốt nhất thị trường.',
                'image' => 'banners/iphone14.jpg',
                'link' => 'https://example.com/iphone14',
                'position' => 'middle',
                'status' => 'active',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(20),
            ],
            [
                'title' => 'iPhone 13 - Giá Cực Hấp Dẫn',
                'description' => 'Sở hữu ngay iPhone 13 với giá giảm sốc!',
                'image' => 'banners/iphone13.jpg',
                'link' => 'https://example.com/iphone13',
                'position' => 'bottom',
                'status' => 'active',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(15),
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
