<?php

namespace App\Models;

use App\Traits\DateForHumans;
use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progression extends Model
{
    use HasFactory, ExternalIdAsRouteKey, DateForHumans;

    protected $fillable = ['external_id', 'candidate_course_id', 'chapter_id', 'is_completed', 'candidate_id'];

    public function candidateCourse(): BelongsTo
    {
        return $this->belongsTo(CandidateCourse::class);
    }

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
