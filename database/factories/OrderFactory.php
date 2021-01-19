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
                'order_code' => $this->faker->randomNumber(6, true),
                'customer_name' => $this->faker->name,
                'customer_surname' => $this->faker->name,
                'customer_email' => $this->faker->freeEmail,
                'city' => $this->faker->city,
                'district' => $this->faker->city,
                'zip' => $this->faker->postcode,
                'products' => "[
                                {
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."'
                                },
                                {
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."'
                                },
                                {
                                    'product_id' : '".$this->faker->numberBetween(1, 30)."'
                                    },
                                ]",
                'discount' => $this->faker->randomElement([5, 10, 20]),
                'tax' => $this->faker->numberBetween(10, 30),
                'sub_total' => $this->faker->numberBetween(20, 90),
                'grand_total' => $this->faker->numberBetween(30, 120),
                'total_quantity' => $this->faker->numberBetween(1, 7),
                'shipping_cost' => $this->faker->randomElement([3, 7, 12]),
                'note' => $this->faker->paragraph(2, true),
                'shipping_company' => $this->faker->randomElement(['Yurtiçi', 'Aras', 'Mng', 'Ptt']),
                'delivery_time' => $this->faker->randomElement(['1-gün', '2-4-gün', '3-7-gün']),
                'payment_type' => $this->faker->randomElement(['HAVALE', 'EFT', 'CREDIT_CARD']),
                'status' => $this->faker->randomElement(['PENDING', 'COMPLETED', 'DECLINED', 'ON_DELIVERY']),
                'card_number' => $this->faker->creditCardNumber,
                'card_expiration' => $this->faker->creditCardExpirationDate,
                'card_cvv' => $this->faker->numberBetween(100, 600),
        ];
    }
}
