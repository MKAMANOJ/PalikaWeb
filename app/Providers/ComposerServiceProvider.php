<?php

namespace App\Providers;

use App\Http\ViewComposers\FrontFooterComposer;
use App\Http\ViewComposers\FrontHeaderFooterComposer;
use App\Http\ViewComposers\FrontLeftSidebarComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

/**
 * Class ComposerServiceProvider
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.sidebar', 'App\Http\ViewComposers\MenuComposer');
        View::composer('front.layouts.footer', FrontFooterComposer::class);
        View::composer(['front.layouts.header', 'front.layouts.footer'], FrontHeaderFooterComposer::class);
        View::composer(['front.layouts.sidebar', 'finder.modules.dashboard.index', 'filler.modules.dashboard.index'], FrontLeftSidebarComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FrontHeaderFooterComposer::class);
        $this->app->singleton(FrontLeftSidebarComposer::class);
    }
}
