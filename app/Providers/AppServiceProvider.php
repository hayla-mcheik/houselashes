<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
          // Share website settings globally
          $websiteSetting = Setting::first();
          View::share('appSetting', $websiteSetting);
  
          // Use a view composer to pass cart data to the navbar
          View::composer('*', function ($view) {
              $cartItems = collect(); // Initialize as empty collection
              if (auth()->check()) {
                  $cartItems = Cart::where('user_id', auth()->user()->id)
                                   ->with('product.productImages') // Eager load product and productImages
                                   ->get();
              }
              $view->with('carts', $cartItems);
          });
    }
}
