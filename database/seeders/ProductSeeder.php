<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Beyaz Tshirt',
                'size' => 'L',
                'color' => 'WHITE',
                'price' => 20,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'beyaz-tshirt',
                'quantity' => 3,
                'image_1' => 'tshirt-2.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Bordo Tshirt',
                'size' => 'L',
                'color' => 'DARK_RED',
                'price' => 30,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'bordo-tshirt',
                'quantity' => 5,
                'image_1' => 'tshirt-6.jpg',
            ],

            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Mavi Tshirt',
                'size' => 'L',
                'color' => 'BLUE',
                'price' => 30,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'mavi-tshirt',
                'quantity' => 6,
                'image_1' => 'tshirt-4.jpg',
            ],

            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Krem Tshirt',
                'size' => 'L',
                'color' => 'CREAM',
                'price' => 45,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'krem-tshirt',
                'quantity' => 20,
                'image_1' => 'tshirt-5.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Siyah Tshirt',
                'size' => 'L',
                'color' => 'BLACK',
                'price' => 70,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'siyah-tshirt',
                'quantity' => 80,
                'image_1' => 'tshirt-1.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '2',
                'name' => 'Sarı Tshirt',
                'size' => 'L',
                'color' => 'YELLOW',
                'price' => 29,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'sarı-tshirt',
                'quantity' => 25,
                'image_1' => 'tshirt-3.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '1',
                'name' => 'Bordo Sweatshirt',
                'size' => 'L',
                'color' => 'DARK_RED',
                'price' => 90,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'bordo-sweatshirt',
                'quantity' => 7,
                'image_1' => 'sweatshirt-1.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '1',
                'name' => 'Siyah Sweatshirt',
                'size' => 'L',
                'color' => 'BLACK',
                'price' => 79,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'siyah-sweatshirt',
                'quantity' => 12,
                'image_1' => 'sweatshirt-2.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '1',
                'name' => 'Beyaz Sweatshirt',
                'size' => 'L',
                'color' => 'WHITE',
                'price' => 100,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'beyaz-sweatshirt',
                'quantity' => 5,
                'image_1' => 'sweatshirt-3.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '1',
                'name' => 'Mavi Sweatshirt',
                'size' => 'L',
                'color' => 'BLUE',
                'price' => 95,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'mavi-sweatshirt',
                'quantity' => 10,
                'image_1' => 'sweatshirt-4.jpg',
            ],
            [
                'category_id' => '1',
                'sub_category_id' => '1',
                'name' => 'Yeşil Sweatshirt',
                'size' => 'L',
                'color' => 'GREEN',
                'price' => 85,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, iusto?',
                'product_slug' => 'yeşil-sweatshirt',
                'quantity' => 90,
                'image_1' => 'sweatshirt-5.jpg',
            ],
        ]);
    }
}
