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
        if(app()->isLocal())
        {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);

        \Carbon\Carbon::setLocale('zh');
        Topic::Observe(TopicObserver::class);


    }
}
