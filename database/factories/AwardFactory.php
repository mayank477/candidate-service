<?php

namespace Database\Factories;

use App\Models\Award;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Award>
 */
class AwardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName . ' Award',
            'description' => $this->faker->text,
            'date_received' => $this->faker->date()
        ];
    }
}
