<?php

namespace MTN\StatamicBookable;

use Illuminate\Support\Facades\Event;
use MTN\StatamicBookable\Commands\BookableSetup;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
        'web' => __DIR__.'/../routes/web.php',
    ];

    function boot() {
        parent::boot();

        $this
            ->publishConfigs()
            ->publishViews()
            ->loadTranslations()
            ->registerNav()
            ->registerEvents()
            ->registerCommands();

    }

    protected function publishConfigs(): ServiceProvider
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bookable.php', 'statamic.bookable');

        $this->publishes([
            __DIR__.'/../config/bookable.php' => config_path('statamic/bookable.php'),
        ], 'bookable-config');

        return $this;
    }

    protected function publishViews(): ServiceProvider
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bookable');

        return $this;
    }

    protected function loadTranslations(): ServiceProvider
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'bookable');

        return $this;
    }

    protected function registerNav(): ServiceProvider {

        Nav::extend(function ($nav) {

            $nav->create('Entries')
                ->section('Bookable')
                ->route('bookable.index')
                ->icon('calendar');

            $nav->create('Reports')
                ->section('Bookable')
                ->route('bookable.reports.index')
                ->icon('performance-increase');

            $nav->create('Settings')
                ->section('Bookable')
                ->route('bookable.settings.index')
                ->icon('picker')
                ->children([]);
        });

        return $this;
    }

    protected function registerEvents(): ServiceProvider
    {
        Event::subscribe(EventSubscriber::class);

        return $this;
    }

    protected function registerCommands(): ServiceProvider
    {
        $this->commands([
            BookableSetup::class,
        ]);

        return $this;
    }
}
