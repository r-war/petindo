<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Models\Product;
use Cart;

class ProductController extends Controller
{
    //
    protected $productRepository;
    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
        //dd($product);

        return view('site.pages.product',compact('product', 'attributes'));   
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add($product->sku, $product->name, $request->input('price'), $request->input('qty'), array(
            'picture'=>$product->images->first()->full,
            'slug' => $product->slug));

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function addToCartBySku($sku)
    {
        $product = Product::sku($sku);

        //dd($product->name);
        $price = $product->sale_price !='' ? $product->sale_price : $product->price;

        Cart::add($product->sku, $product->name, $price, 1, array(
            'picture'=>$product->images->first()->full,
            'slug' => $product->slug));

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function shop()
    {
        $products = $this->productRepository->listProducts();

        return view('site.pages.shop', compact('products'));
    }

    public function sort(Request $request)
    {
        switch ($request->sort) {
            case 'date':
                $sort = ['created_at', 'desc'];
                break;
            case 'price':
                $sort = ['price', 'asc'];
                break;
            case 'price-desc':
                $sort = ['price', 'desc'];
                break;
            default:
                $sort = ['name', 'asc'];
                break;
        }

        $products = Product::orderBy($sort[0], $sort[1])->get();
        
        return view('site.pages.shop', compact('products'));
    }

    public function search(Request $request)
    {
        if($request->input('category') !='all')
        {
            $results = Product::search($request->search)->whereHas('categories', function ($q) use($request){
                $q->where('slug',$request->category);
            })->get();
        }else{
            $results = Product::search($request->search)->get(); 
        }

        return view('site.pages.search', compact('results'));
    }
}
