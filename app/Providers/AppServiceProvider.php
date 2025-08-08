<?php

namespace App\Providers;

use App\Models\Anouncement;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $setting = Setting::first();
            $wa = !empty($setting->wa) ? $setting->wa : config('app.wa_admin');
            $announcement = Anouncement::where('is_active', true)->first();
            $view->with('announcement', $announcement)
                 ->with('wa', $wa);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
