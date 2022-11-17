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
            'id' => $this -> faker -> countryCode(),
            'fullname' => $this->faker->name,
            'gender' => array_rand([1,2],1),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'email' => $this->faker->unique()->safeEmail,
            'address'=> $this -> faker ->streetAddress(),
            'email'=> $this -> faker ->companyEmail(),
            'phone'=> $this -> faker ->tollFreePhoneNumber(),
            'image'=> "images/teachers/2001.jpg",
        ];
    }
}
