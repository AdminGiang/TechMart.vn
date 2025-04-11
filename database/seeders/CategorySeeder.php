<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Smartphone'],
            ['id' => 2, 'name' => 'Macbook'],
            ['id' => 3, 'name' => 'Ipad'],
            ['id' => 4, 'name' => 'AppleWatch'],
            ['id' => 5, 'name' => 'AirPods'],
        ]);
    }
}
