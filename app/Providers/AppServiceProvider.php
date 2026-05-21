<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            if (\Illuminate\Support\Facades\Schema::hasTable('services')) {
                $view->with('globalServices', \App\Models\Service::where('status', 'active')->get());
            }
            if (\Illuminate\Support\Facades\Schema::hasTable('areas')) {
                $view->with('globalAreas', \App\Models\Area::all());
            }
            if (\Illuminate\Support\Facades\Schema::hasTable('menus')) {
                $view->with('menus', \App\Models\Menu::where('v', true)->orderBy('order')->get());
            }
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                try {
                    $settings = \App\Models\Setting::pluck('value', 'key')->all();
                    $view->with('hdr', $settings['hdr'] ?? []);
                    $view->with('ftr', $settings['ftr'] ?? []);
                    $view->with('contact', $settings['contact'] ?? []);
                    $view->with('colors', $settings['colors'] ?? []);
                } catch (\Exception $e) {
                    $view->with('hdr', []);
                    $view->with('ftr', []);
                    $view->with('contact', []);
                    $view->with('colors', []);
                }
            } else {
                $view->with('hdr', []);
                $view->with('ftr', []);
                $view->with('contact', []);
                $view->with('colors', []);
            }
        });
    }
}
