<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $products = Product::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $cart = Cart::firstWhere('customer_id', 1);
        view()->share(['cart' => $cart, 'categories' => $categories, 'subCategories' => $subCategories, 'products' => $products]);
    }
}
