<?php

namespace App\Models;

use App\Interfaces\UploadsFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Candidate extends User implements UploadsFile
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'dob', 'place_of_birth', 'nationality', 'phone_number',
        'address', 'github_url', 'linked_in_url', 'job_title', 'external_id', 'years_of_experience', 'address'
    ];
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(CandidateCourse::class);
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
