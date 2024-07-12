<?php

namespace App\Observers;

use App\Models\Award;

class AwardObserver
{
    public function creating(Award $award): void
    {
        $award->external_id = uuid_create();
    }
    /**
     * Handle the Award "created" event.
     */
    public function created(Award $award): void
    {
        //
    }

    /**
     * Handle the Award "updated" event.
     */
    public function updated(Award $award): void
    {
        //
    }

    /**
     * Handle the Award "deleted" event.
     */
    public function deleted(Award $award): void
    {
        //
    }

    /**
     * Handle the Award "restored" event.
     */
    public function restored(Award $award): void
    {
        //
    }

    /**
     * Handle the Award "force deleted" event.
     */
    public function forceDeleted(Award $award): void
    {
        //
    }
}
