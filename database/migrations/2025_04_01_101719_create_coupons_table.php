<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã voucher (ví dụ: GIAM10K)
            $table->string('name')->nullable(); // Tên voucher (ví dụ: Giảm 10K cho đơn hàng đầu tiên)
            $table->text('description')->nullable(); // Mô tả chi tiết về voucher
            $table->enum('type', ['fixed', 'percentage'])->default('fixed'); // Loại giảm giá: cố định (fixed) hoặc phần trăm (percentage)
            $table->decimal('value', 10, 2); // Giá trị giảm giá (số tiền hoặc phần trăm)
            $table->decimal('min_order_amount', 10, 2)->nullable(); // Giá trị đơn hàng tối thiểu để áp dụng voucher
            $table->integer('quantity')->nullable(); // Số lượng voucher có sẵn (null nếu không giới hạn)
            $table->integer('usage_limit_per_user')->nullable(); // Số lần tối đa mỗi người dùng có thể sử dụng (null nếu không giới hạn)
            $table->timestamp('start_date')->nullable(); // Thời gian bắt đầu hiệu lực
            $table->timestamp('end_date')->nullable(); // Thời gian kết thúc hiệu lực
            $table->boolean('is_active')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
