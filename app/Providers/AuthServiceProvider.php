<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Client;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // See the policies instead.
        // Gate::define('update-client', function(User $user, Client $client) {
        //     return $client->user_id === $user->id,
        // });
        // Gate::define('delete-client', function(User $user, Client $client) {
        //     return $client->user_id === $user->id,
        // });
    }
}
