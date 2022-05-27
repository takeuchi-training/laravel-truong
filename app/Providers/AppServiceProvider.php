<?php

namespace App\Providers;

use App\MyObservers\TestUserObserverInterface;
use App\MyObservers\UserObserverImpl;
use App\Services\MyTestService;
use App\View\Components\NavBar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
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
        $this->app->bind(TestUserObserverInterface::class, UserObserverImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('navigation', NavBar::class);
        // Model::preventLazyLoading();
    }
}
