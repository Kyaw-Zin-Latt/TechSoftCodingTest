<?php

namespace App\Providers;

use App\Models\AboutAndSetting;
use App\Models\BackendConfig;
use App\Models\Category;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use App\Models\Version;
use App\Models\Wallpaper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

//        View::share("abouts",AboutAndSetting::first());
        View::share("version",Version::first());
        View::share("backend",BackendConfig::first());
        View::share("roles",Role::all());
        View::share("regUsers",User::with("roles")->where("role_id","=","4")->latest("id")->get());
        View::share("regUsersLimit",User::with("roles")->where("role_id","=","4")->latest("id")->limit(4)->get());
    }
}
