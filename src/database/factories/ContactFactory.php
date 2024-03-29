<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->email(),
            'postcode' => $this->faker->regexify('[0-9]{3}-[0-9]{4}'),
            'address' => $this->faker->city(),
            'building_name' => $this->faker->secondaryAddress(),
            'opinion' => $this->faker->realText(120)
        ];
    }
}
