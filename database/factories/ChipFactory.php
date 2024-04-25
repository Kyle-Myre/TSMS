<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chip>
 */
class ChipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
            'provider' => $this->faker->company,
            'telephone' => $this->faker->phoneNumber,
            'is_active' => $this->faker->boolean(80) // 80% chance of being active
        ];
    }
}
