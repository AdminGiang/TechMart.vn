<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('discount_percentage', 5, 2); // Phần trăm giảm giá (ví dụ: 10.50%)
            $table->decimal('discount_amount', 12, 2)->nullable(); // Số tiền giảm giá cố định (nếu có)
            $table->decimal('final_price', 12, 2); // Giá sau khi giảm
            $table->timestamp('start_date')->nullable(); // Ngày bắt đầu giảm giá
            $table->timestamp('end_date')->nullable(); // Ngày kết thúc giảm giá
            $table->boolean('is_active')->default(true); // Trạng thái kích hoạt
            $table->string('discount_type')->default('percentage'); // Loại giảm giá (percentage/fixed)
            $table->text('description')->nullable(); // Mô tả về đợt giảm giá
            $table->timestamps();

            // Khóa ngoại liên kết với bảng products, sử dụng Id thay vì id
            $table->foreign('product_id')
                  ->references('Id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}; 