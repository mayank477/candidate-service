<?php

namespace App\Observers;

use App\Models\Progression;

class ProgressionObserver
{
    public function creating(Progression $progression): void
    {
        $progression->external_id = uuid_create();
    }
    /**
     * Handle the Progression "created" event.
     */
    public function created(Progression $progression): void
    {
        //
    }

    /**
     * Handle the Progression "updated" event.
     */
    public function updated(Progression $progression): void
    {
        //
    }

    /**
     * Handle the Progression "deleted" event.
     */
    public function deleted(Progression $progression): void
    {
        //
    }

    /**
     * Handle the Progression "restored" event.
     */
    public function restored(Progression $progression): void
    {
        //
    }

    /**
     * Handle the Progression "force deleted" event.
     */
    public function forceDeleted(Progression $progression): void
    {
        //
    }
}
