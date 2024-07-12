<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Award;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {
        Candidate::factory(13)->create();
        Candidate::query()->get()->each(fn(Candidate $candidate) => Award::factory(random_int(1, 3))->create(['candidate_id' => $candidate->id]));
    }
}
