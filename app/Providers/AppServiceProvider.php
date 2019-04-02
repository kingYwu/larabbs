<?php

namespace App\Providers;

use App\Observers\TopicObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Topic;
use App\Observers\UserObserver;


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
        \Carbon\Carbon::setLocale('zh');
        Topic::Observe(TopicObserver::class);
    }
}
