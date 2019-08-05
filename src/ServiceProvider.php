<?php namespace Hebinet\BladeHelpers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        Blade::directive('includeOnce', function ($expression) {
            return (new Directives())->compileIncludeOnce($expression);
        });
    }

    /**
     *
     */
    public function register()
    {

    }
}
