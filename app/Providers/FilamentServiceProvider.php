<?php

namespace App\Providers;

use App\Filament\Resources\ContentResource;
use App\Filament\Resources\MessageResource;
use App\Filament\Resources\ResponsabilityResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\TeamResource;
use App\Filament\Resources\UserResource;
use App\Models\Responsability;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Spatie\Permission\Models\Role;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function isAdministrator() {

    }
    public function boot()
    {
//auth()->user()->role->name=='admin'
        if( true){

            Filament::serving(function () {
                Filament::registerUserMenuItems([
                    UserMenuItem::make()
                        ->label('users')
                        ->url(UserResource::getUrl())
                        ->icon('heroicon-o-users'),

                    UserMenuItem::make()
                        ->label('messages')
                        ->url(MessageResource::getUrl())
                        ->icon('heroicon-o-collection'),

                    UserMenuItem::make()
                        ->label('roles')
                        ->url(RoleResource::getUrl())
                        ->icon('heroicon-s-cog'),

                    UserMenuItem::make()
                        ->label('content')
                        ->url(ContentResource::getUrl())
                        ->icon('heroicon-o-collection'),

                    UserMenuItem::make()
                        ->label('responsabilities')
                        ->url(ResponsabilityResource::getUrl())
                        ->icon('heroicon-o-collection'),

                    UserMenuItem::make()
                        ->label('teams')
                        ->url(TeamResource::getUrl())
                        ->icon('heroicon-o-user-group'),


                ]);
            });
        }
    }
}
