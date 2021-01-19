<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'cart_id' => $this->faker->unique(true)->numberBetween(0, 50),
                'name' => $this->faker->name,
                'surname' => $this->faker->company,
                'email' => $this->faker->freeEmail,
                'password' => $this->faker->password(10, 20),
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->address,
                'second_address' => $this->faker->address,
                'remember_token' => Str::random(10),
        ];
    }
}
