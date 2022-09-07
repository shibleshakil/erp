<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use DB;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($settings){
            $settings->with('setting', DB::table('settings')->find(1));
            $settings->with('emailSetup', DB::table('email_setups')->find(1));
            $settings->with('chkurl', Route::currentRouteName());

            if (!session()->has('popup'))
            {
                view()->share('visit', 1);
            }
            session()->put('popup' , 1);
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
