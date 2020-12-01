<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
  
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
       return $user->hasAnyRole(['DG']);
   });


   Gate::define('edit-users', function ($user) {
       return $user->isAdmin();
      // return $user->hasAnyRole(['auteur','admin']);
   });
    Gate::define('delete-users', function ($user) {
       return $user->isAdmin();
   });

  // Gate::define('update-post', function ($user, $post) {
     //  return $user->id === $post->user_id;
  // });

    }
}
