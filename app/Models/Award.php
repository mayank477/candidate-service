<?php

namespace App\Models;

use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Award extends Model
{
    use HasFactory, ExternalIdAsRouteKey;

    protected $casts = ['date_received' => 'datetime'];

    protected $fillable = ['external_id', 'description', 'date_received', 'name', 'description', 'candidate_id'];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
