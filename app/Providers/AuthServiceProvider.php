<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Content;
use App\Models\Message;
use App\Models\Responsability;
use App\Models\Team;
use App\Models\User;
use App\Policies\ContentPolicy;
use App\Policies\MessagePolicy;
use App\Policies\ResponsabiltyPolicy;
use App\Policies\RolePolicy;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class=>UserPolicy::class,
        Responsability::class=>ResponsabiltyPolicy::class,
        Team::class=>TeamPolicy::class,
        Message::class=>MessagePolicy::class,
        Content::class=>ContentPolicy::class,
        Role::class=>RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
