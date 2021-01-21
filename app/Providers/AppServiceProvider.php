<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

        view()->composer('*', function ($view)
        {   $products = Product::all();
            $categories = Category::all();
            $subCategories = SubCategory::all();
            if(session()->get('customer'))
            {
                $sessionCart = Cart::where('customer_id', Session::get('customer')['id'])->first();
                $view->with(['sessionCart' =>  $sessionCart, 'categories' => $categories, 'subCategories' => $subCategories, 'products' => $products]);
            }
            $view->with(['categories' => $categories, 'subCategories' => $subCategories, 'products' => $products]);
        });


    }
}
