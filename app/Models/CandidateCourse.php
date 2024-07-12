<?php

namespace App\Models;

use App\Traits\DateForHumans;
use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CandidateCourse extends Model
{
    use HasFactory, ExternalIdAsRouteKey, DateForHumans;

    protected $fillable = ['external_id', 'course_id', 'candidate_id', 'is_completed', 'progress'];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function progressions(): HasMany
    {
        return $this->hasMany(Progression::class);
    }

    public function chapters(): HasManyThrough
    {
        return $this->hasManyThrough(Chapter::class, Progression::class);
    }
}
