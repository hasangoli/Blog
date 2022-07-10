<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Partner;
use App\Models\Country;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
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
        $this->app->bind('path.public',function(){
            return realpath(base_path() . '/../public_html');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        view()->composer(['admin.sidebar'],function($view){
            $adminInfo=Auth::user();
            $view->with(compact('adminInfo'));
        });

        view()->composer(['layout.footer','layout.header','layout.app'],function($view){
            $setting = Setting::first();
            $pages=Page::get();
            $view->with(compact(['setting','pages']));
        });

        view()->composer(['partial.owlCarousel'],function($view){
            $partners = Partner::get();
            $view->with(compact('partners'));
        });

        view()->composer(['partial.blogSidebar'],function($view){
            $countries = Country::get();
            $adminInfo=Auth::user();
            $view->with(compact('countries'));
        });

    }
}
