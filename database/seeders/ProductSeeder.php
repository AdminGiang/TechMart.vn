<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            
            [
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 15000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 16 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
<<<<<<< HEAD
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
=======
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 15000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 16 pro max',
>>>>>>> 13307ea57f60cd5f09b74a8a00880031b0b795ee
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
<<<<<<< HEAD
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
=======
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 15000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 16 pro max',
>>>>>>> 13307ea57f60cd5f09b74a8a00880031b0b795ee
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
<<<<<<< HEAD
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
=======
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 15000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 16 pro max',
>>>>>>> 13307ea57f60cd5f09b74a8a00880031b0b795ee
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
<<<<<<< HEAD
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
            [
                'name' => 'Iphone 16 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 25000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 11 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ],
=======
                'name' => 'Iphone 15 Pro Max',
                'description' => 'Điện thoại Iphone 11 Pro Max',
                'categoryId' => 2,
                'userId' => 1,
                'price' => 15000000,
                'isPublish' => 1,
                'sale' => 10,
                'image' => 'https://raw.githubusercontent.com/hdpngworld/HPW/main/uploads/65038654434d0-iPhone%2015%20Pro%20Natural%20titanium%20png.png',
                'tag' => 'điện thoại, iphone, 16 pro max',
                'isTagBlog' => 0,
                'count' => 10
            ]
>>>>>>> 13307ea57f60cd5f09b74a8a00880031b0b795ee
        ]);
    }
}