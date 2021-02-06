<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'customer_id' => $this->faker->numberBetween(1, 30),
                'order_code' => mt_rand(100000, 999999),
                'customer_name' => $this->faker->name,
                'customer_surname' => $this->faker->name,
                'customer_email' => $this->faker->freeEmail,
                'address' => $this->faker->address,
                'city_id' => $this->faker->numberBetween(1, 81),
                'district_id' => $this->faker->numberBetween(1, 950),
                'zip' => $this->faker->postcode,
                'products' => "[
                                    {
                                        'product_id':".$this->faker->numberBetween(1, 100).",
                                        'name':".$this->faker->name.",
                                        'price':".$this->faker->numberBetween(20, 50).",
                                        'quantity':".$this->faker->numberBetween(1, 10).",
                                        'size':".$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']).",
                                        'image_1':".$this->faker->name.",
                                        'product_slug':".$this->faker->slug(2, true)."
                                    }
                                ]",
                'tax' => $this->faker->numberBetween(10, 30),
                'sub_total' => $this->faker->numberBetween(20, 90),
                'grand_total' => $this->faker->numberBetween(30, 120),
                'total_quantity' => $this->faker->numberBetween(1, 7),
                'shipping_cost' => $this->faker->randomElement([3, 7, 12]),
                'note' => $this->faker->paragraph(2, true),
                'shipping_company' => $this->faker->randomElement(['YURTICI', 'ARAS', 'MNG', 'PTT']),
                'delivery_time' => $this->faker->randomElement(['1_DAY', '2-4_DAY', '3-7_DAY']),
                'payment_type' => $this->faker->randomElement(['HAVALE', 'EFT', 'CREDIT_CARD']),
                'status' => $this->faker->randomElement(['PENDING', 'COMPLETED', 'DECLINED', 'ON_DELIVERY']),
                'card_number' => $this->faker->creditCardNumber,
                'card_expiration' => $this->faker->creditCardExpirationDate,
                'card_cvv' => $this->faker->numberBetween(100, 600),
                'accept_contract' => $this->faker->randomElement(["NO", "YES"]),
        ];
    }
}
