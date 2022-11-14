<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_Name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'last_Name'=> $this -> faker ->name(),
            'address'=> $this -> faker ->streetAddress(),
            'email'=> $this -> faker ->companyEmail(),
            'phone'=> $this -> faker ->tollFreePhoneNumber(),
        ];
    }
}
