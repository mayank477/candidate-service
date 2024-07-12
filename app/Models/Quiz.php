<?php

namespace App\Models;

use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    use HasFactory, ExternalIdAsRouteKey;

    protected $fillable = ['chapter_id', 'course_id', 'title', 'description', 'expires_at', 'image_url', 'is_active'];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
