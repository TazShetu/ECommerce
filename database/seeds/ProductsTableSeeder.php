<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 30)->create();

//        $p1 = [
//            'name' => 'Book on Laravel',
//            'image' => 'uploads/products/book.png',
//            'price' => 5000,
//            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
//        ];
//        $p2 = [
//            'name' => 'Book on PHP',
//            'image' => 'uploads/products/book.png',
//            'price' => 3000,
//            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.'
//        ];
//        App\Product::create($p1);
//        App\Product::create($p2);
    }
}
