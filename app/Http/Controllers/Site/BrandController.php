<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show($brand)
    {
        $products = Brand::where('slug',$brand)->first()->products;

        return view('site.pages.shop', compact('products'));
    }
}
