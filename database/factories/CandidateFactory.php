<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'dob' => $this->faker->date,
            'place_of_birth' => $this->faker->city,
            'nationality' => $this->faker->country,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'github_url' => $this->faker->url,
            'linked_in_url' => $this->faker->url,
            'job_title' => $this->faker->jobTitle,
            'years_of_experience' => $this->faker->numberBetween(1, 20)
        ];
    }
}
