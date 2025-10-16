<?php

namespace App\Providers;

use App\Model\Setting;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        app('view')->composer('*', function ($view) {
            $request = app(\Illuminate\Http\Request::class);
            if ($appRoute = app('request')->route()) {
                $action = $appRoute->getAction();
                $settings = Setting::first();
                if (!empty($action['controller'])) {
                    $controller = (class_basename($action['controller'])) ? class_basename($action['controller']) : 'HomeController@index';
                    list($controller, $action) = explode('@', $controller);
                } else {
                    $controller = "HomeController";
                    $action = "index";
                }
                $view->with(compact('controller', 'action', 'settings'));
            }
        });
    }
}
