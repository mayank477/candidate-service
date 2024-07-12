<?php

namespace App\Models;

use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory, ExternalIdAsRouteKey;

    protected $fillable = ['title', 'external_id', 'description', 'is_published', 'is_free', 'is_access', 'image_url', 'video_url', 'position'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
