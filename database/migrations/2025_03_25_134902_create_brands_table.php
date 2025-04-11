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
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính (bigint, auto-increment)
            $table->string('name')->unique(); // Tên thương hiệu, không trùng lặp
            $table->string('slug')->unique(); // Đường dẫn SEO-friendly
            $table->string('logo')->nullable(); // Ảnh logo (có thể để trống)
            $table->text('description')->nullable(); // Mô tả thương hiệu
            $table->boolean('status')->default(1); // 1: Hoạt động, 0: Ngừng hoạt động
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
