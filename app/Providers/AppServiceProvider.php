<?php

namespace App\Providers;

use App\Models\Like;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\SiteStyle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // obtém o registro do site_style do usuário logado
        $siteStyle = SiteStyle::all();
        $likes = Like::all();
        $route = Route::current();
        
        if ($route) {
            $routeName = $route->getName();
        } else {
            $routeName = null;
        }

        View::share('routeName', $routeName);

        // Compartilha a variável
        View::share('siteStyle', $siteStyle);
        View::share('likes', $likes);
    }
}
