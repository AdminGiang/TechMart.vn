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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('categoryId');
            $table->unsignedBigInteger('userId');
            $table->decimal('price', 10, 2);
            $table->boolean('isPublish')->default(1);
            $table->integer('sale')->default(0);
            $table->string('image')->nullable();
            $table->string('tag')->nullable();
            $table->boolean('isTagBlog')->default(0);
            $table->unsignedBigInteger('saleId')->nullable();
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
