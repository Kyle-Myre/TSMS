<?php

namespace Database\Factories;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => $this->faker->unique()->randomNumber(6),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'entity_id' => Entity::factory() // generate a related entity
        ];
    }
}
