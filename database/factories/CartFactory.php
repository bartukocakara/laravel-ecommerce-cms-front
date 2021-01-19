<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'customer_id' => $this->faker->unique(true)->numberBetween(0, 50),
                'products' => "[{
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."',
                                    'price' : '".$this->faker->numberBetween(25, 100)."',
                                    'quantity' : '".$this->faker->numberBetween(1, 10)."',
                                    'size' : '".$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL'])."',
                                },
                                {
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."',
                                    'price' : '".$this->faker->numberBetween(25, 100)."',
                                    'quantity' : '".$this->faker->numberBetween(1, 10)."',
                                    'size' : '".$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL'])."',
                                },
                                {
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."',
                                    'price' : '".$this->faker->numberBetween(25, 100)."',
                                    'quantity' : '".$this->faker->numberBetween(1, 10)."',
                                    'size' : '".$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL'])."'
                                }
                                ]",
                'total_price' => $this->faker->randomElement(["100", "120", "140", "160"]),
                'total_quantity' => $this->faker->randomElement(["5", "4", "2", "1"]),
                'shipping_cost' => $this->faker->randomElement(['5', '8', '12']),
        ];
    }
}
