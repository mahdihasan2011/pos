<?php

namespace App\Providers;

use App\Model\Company;
use App\Model\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider {
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

        View::composer('*', function ($view)
        {
            $request = app(Request::class);
            if ($appRoute = app('request')->route())
            {
                $action = $appRoute->getAction();
                $settings = Setting::first();
                $company = Company::first();
                if (!empty($action['controller']))
                {
                    $controller = (class_basename($action['controller'])) ? class_basename($action['controller']) : 'HomeController@index';
                    list($controller, $action) = explode('@', $controller);
                } else
                {
                    $controller = "HomeController";
                    $action = "index";
                }
<<<<<<< HEAD
                $view->with(compact('controller', 'action', 'settings', 'company'));
=======
                $view->with(compact('controller', 'action', 'settings'));
>>>>>>> 012275c567990345693f3debf78fbaebc3440630
            }
        });
    }
}
