<?php

namespace App\Providers;

use App\Models\Award;
use App\Models\Candidate;
use App\Models\Progression;
use App\Observers\AwardObserver;
use App\Observers\CandidateObserver;
use App\Observers\ProgressionOberserver;
use App\Observers\ProgressionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Candidate::observe(CandidateObserver::class);
        Award::observe(AwardObserver::class);
        Progression::observe(ProgressionObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
