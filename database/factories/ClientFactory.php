<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'email_verified_at' => fake()->dateTime(),
            'password' => bcrypt('password'),
            'billing_address' => fake()->address(),
            'shipping_address' => fake()->address(),
            'country' => fake()->country(),
            'phone' => fake()->phoneNumber(),
            'created_at' => fake()->dateTime()
        ];
    }
}
