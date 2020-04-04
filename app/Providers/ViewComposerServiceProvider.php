<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.*', function ($view) {
            $view->with('categories', Category::orderByRaw('name')->get())
            ->with('brands', Brand::all());
        });

        View::composer('site.core.nav', function($view){
            $view->with('menus', Menu::all());
        });

        View::composer('site.core.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count())
                ->with('carts', Cart::getContent());
        });
    }
}
