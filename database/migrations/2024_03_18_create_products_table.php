<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Name', 50);
            $table->string('Description', 500);
            $table->integer('CategoryId');
            $table->integer('UserId');
            $table->float('Price');
            $table->boolean('IsPublish')->default(true);
            $table->float('Sale')->default(0);
            $table->string('Image', 500);
            $table->string('Tag', 500);
            $table->boolean('IsTagBlog')->default(false);
            $table->integer('Count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}; 