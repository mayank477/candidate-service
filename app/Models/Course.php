<?php

namespace App\Models;

use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory, ExternalIdAsRouteKey;

    protected $fillable = ['title', 'external_id', 'description', 'category', 'is_published', 'is_free', 'is_access', 'image_url', 'video_url'];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function candidates(): BelongsTo
    {
        return $this->belongsTo(CandidateCourse::class);
    }
}
