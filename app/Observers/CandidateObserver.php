<?php

namespace App\Observers;

use App\Models\Candidate;

class CandidateObserver
{
    /**
     * Handle the Candidate "creating" event.
     *
     * @param Candidate $candidate The candidate instance being created.
     *
     * @return void
     */
    public function creating(Candidate $candidate): void
    {
        $candidate->external_id = uuid_create();
    }
    /**
     * Handle the Candidate "created" event.
     */
    public function created(Candidate $candidate): void
    {
        //
    }

    /**
     * Handle the Candidate "updated" event.
     */
    public function updated(Candidate $candidate): void
    {
        //
    }

    /**
     * Handle the Candidate "deleted" event.
     */
    public function deleted(Candidate $candidate): void
    {
        //
    }

    /**
     * Handle the Candidate "restored" event.
     */
    public function restored(Candidate $candidate): void
    {
        //
    }

    /**
     * Handle the Candidate "force deleted" event.
     */
    public function forceDeleted(Candidate $candidate): void
    {
        //
    }
}
