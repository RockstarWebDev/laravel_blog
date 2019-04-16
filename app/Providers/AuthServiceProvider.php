<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts','App\Policies\postPolicy');
        Gate::define('posts.tag','App\Policies\postPolicy@tag');
        Gate::define('posts.category','App\Policies\postPolicy@category');


        //Admin user gate
        Gate::resource('admins', 'App\Policies\UserPolicy');
        Gate::define('admins.superAdmin', 'App\Policies\UserPolicy@SuperAdmin');
    }
}
