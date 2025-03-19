<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discount;
use App\Models\Product;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách sản phẩm
        $products = Product::all();

        foreach ($products as $product) {
            // Random một số sản phẩm sẽ có giảm giá
            if (rand(0, 1)) {
                $discountPercentage = rand(5, 30); // Giảm giá từ 5% đến 30%
                $finalPrice = $product->Price * (1 - $discountPercentage / 100);

                Discount::create([
                    'product_id' => $product->Id,
                    'discount_percentage' => $discountPercentage,
                    'final_price' => $finalPrice,
                    'start_date' => now(),
                    'end_date' => now()->addDays(rand(7, 30)), // Giảm giá từ 7-30 ngày
                    'is_active' => true,
                    'discount_type' => 'percentage',
                    'description' => 'Khuyến mãi tháng ' . now()->format('m/Y')
                ]);
            }
        }
    }
}
