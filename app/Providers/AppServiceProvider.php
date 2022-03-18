<?php

namespace App\Providers;

use App\Http\View\Composers\LayoutComposer;
use Illuminate\Bus\Dispatcher;
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
    public function boot(Dispatcher $events)
    {

        // $this->menuItems = ['Men', 'kid', 'unnisex'];
        // view()->composer('master', function ($view) {
        //     $view->with(['category' => $this->menuItems]);
        // });
        view()->composer('master', LayoutComposer::class);
    }
}