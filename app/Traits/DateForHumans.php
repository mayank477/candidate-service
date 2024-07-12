<?php

namespace App\Traits;

trait DateForHumans
{
    public function createdAtToString()
    {
        return $this->created_at?->format('Y-m-d H:i:s');
    }

    public function updatedAtToString()
    {
        return $this->updated_at?->format('Y-m-d H:i:s');
    }
}
