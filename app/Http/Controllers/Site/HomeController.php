<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class HomeController extends Controller
{
    
    public function index()
    {
        $banners    = Banner::all();
        $categories = Category::all();
        $products   = Product::all();
        $brands     = Brand::all();
        return view('site.pages.home',compact('banners','categories', 'products', 'brands'));
    }
}
