<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-event', function($user, $event){
            return $user ->id == $event->user_id;
        });
        Gate::define('delete-event', function($user, $event){
            return $user ->id == $event->user_id;
        });
        Gate::define('delete-registration', function($event, $registration){
            return $event ->id == $registration->event_id;
        });
        //
    }
}
