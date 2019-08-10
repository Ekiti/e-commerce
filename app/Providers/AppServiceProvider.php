<?php
namespace App\Providers;

use App\Vendor;
use App\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        $settings = Settings::first();
        $vendors = Vendor::where('vendor_verified', 1)->where('vendor_status', 200)->get();
        View::share('settings', $settings);
        View::share('vendors', $vendors);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
