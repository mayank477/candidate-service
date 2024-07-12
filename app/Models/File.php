<?php

namespace App\Models;

use App\Traits\ExternalIdAsRouteKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    use HasFactory, ExternalIdAsRouteKey;

    protected $fillable = ['external_id', 'name', 'path', 'size', 'type', 'model_id', 'model_type'];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
