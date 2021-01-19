<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->freeEmail,
            'title' => $this->faker->sentence(5, true),
            'content' => $this->faker->paragraph(3, true),
            'status' => $this->faker->randomElement(['READ', 'UNREAD']),
            'type' => $this->faker->randomElement(['HELP', 'COMPLIANT', 'SUGGESTION'])
        ];
    }
}
