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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Tiêu đề banner
            $table->text('description')->nullable(); // Mô tả banner
            $table->string('image'); // Đường dẫn ảnh banner
            $table->string('link')->nullable(); // Link khi nhấn vào banner
            $table->enum('position', ['top', 'middle', 'bottom'])->default('top'); // Vị trí hiển thị
            $table->enum('status', ['active', 'inactive'])->default('active'); // Trạng thái banner
            $table->timestamp('start_date')->nullable(); // Ngày bắt đầu hiển thị
            $table->timestamp('end_date')->nullable(); // Ngày kết thúc hiển thị
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
