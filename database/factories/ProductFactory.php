<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'category_id' => $this->faker->numberBetween(1, 2),
                'sub_category_id' => $this->faker->numberBetween(1, 2),
                'name' => $this->faker->randomElement(['Kırmızı Tişört', 'Siyah Tişört', 'Yeşil SweatShirt', 'Kırmızı Sweatshirt', 'Siyah Tişört', 'Yeşil Tişört']),
                'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
                'color' => $this->faker->colorName,
                'price' => $this->faker->randomElement(["20", "30", "50", "70", "80"]),
                'description' => $this->faker->sentence(4, true),
                'product_slug' => $this->faker->slug(3, true),
                'quantity' => $this->faker->numberBetween(1, 20),
                'image_1' => $this->faker->image('public/storage/product-images', 300, 300, null, false),
                'image_2' => $this->faker->image('public/storage/product-images', 300, 300, null, false),
                'image_3' => $this->faker->image('public/storage/product-images', 300, 300, null, false),
                'stock_status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
