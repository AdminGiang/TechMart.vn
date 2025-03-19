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
        // Xóa tất cả discount cũ
        Discount::truncate();
        
        // Lấy danh sách sản phẩm
        $products = Product::all();

        foreach ($products as $product) {
            // Tính phần trăm giảm giá dựa trên giá sản phẩm
            $price = $product->Price;
            
            // Chỉ giảm giá cho sản phẩm có giá > 3 triệu
            if ($price > 3000000) {
                $discountPercentage = $this->calculateDiscountPercentage($price);
                $finalPrice = $price * (1 - $discountPercentage / 100);

                // Chỉ tạo giảm giá nếu giá cuối cùng > 0
                if ($finalPrice > 0) {
                    Discount::create([
                        'product_id' => $product->Id,
                        'discount_percentage' => $discountPercentage,
                        'final_price' => $finalPrice,
                        'start_date' => now(),
                        'end_date' => now()->addDays(30),
                        'is_active' => true,
                        'discount_type' => 'percentage',
                        'description' => 'Khuyến mãi tháng ' . now()->format('m/Y')
                    ]);
                }
            }
        }
    }

    private function calculateDiscountPercentage($price)
    {
        // Giá từ 1-5 triệu: giảm 3-10%
        if ($price <= 5000000) {
            return rand(3 * 10, 10 * 10) / 10; // Để có thể có số thập phân
        }
        
        // Giá từ 5-10 triệu: giảm 10-15%
        if ($price <= 10000000) {
            return rand(10 * 10, 15 * 10) / 10;
        }
        
        // Giá từ 10-20 triệu: giảm 15-20%
        if ($price <= 20000000) {
            return rand(15 * 10, 20 * 10) / 10;
        }
        
        // Giá từ 20-50 triệu: giảm 20-25%
        if ($price <= 50000000) {
            return rand(20 * 10, 25 * 10) / 10;
        }
        
        // Giá trên 50 triệu: giảm 10-30%
        return rand(10 * 10, 30 * 10) / 10;
    }
}
