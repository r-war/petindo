@extends('site.core.master')
@section('title', 'Shop')

@section('content')
    <section class="main-home main-home-v2 main-blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-9- col-sm-8 col-xs-12 col-75 col-col-right">
                    <div
                        class="main-home-page-right-content main-home-page-right-content-grid"
                    >
                        <div class="right-content-detail">
                            <!-- banner -->
                            <div class="banner-grid scale">
                                <img
                                    src="https://ecs7.tokopedia.net/img/cache/1190/shops-1/2019/2/8/48363349/48363349_f470f4bd-67d9-4a2b-bffb-a89a044b487e.jpeg"
                                    alt=""
                                />
                            </div>
                            <!--products-top-title -->
                            <!--  -->
                            <div class="products-top-title">
                                <div class="cart-collaterals-info-form-product">
                                <form method="get" action="{{route('shop.sort')}}" accept-charset="utf-8" id="form-sort">
                                    <div class="selectbox">
                                        <select
                                        id="disabledSelect"
                                        name="sort"
                                        class=" input-post"
                                        onchange="$('#form-sort').submit()"
                                        >
                                        <option value="1">Default sorting</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price"
                                            >Sort by price: low to high</option
                                        >
                                        <option value="price-desc"
                                            >Sort by price: high to low</option
                                        >
                                        </select>
                                    </div>
                                    </form>
                                </div>
                                {{-- <div class="pager-title">
                                    <p>Showing 1 to 12 of 19 total</p>
                                </div> --}}
                            </div>
                            <!--end products-top-title -->
                            <!-- bestsellerproduct -->
                            <div
                                class="product-view-grid product-view-grid-02"
                                id="tabs-grid"
                            >
                                <div class="products-grid row fivecolumns">
                                  @forelse ($products as $product)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 products-mb">
                                        <!-- item-inner -->
                                        <div class="item-inner">
                                            @if ($product->images->count() > 0)
                                                <div class="box-images">
                                                <a class="product-image" href="{{ route('product.show', $product->slug) }}" title=""
                                                    ><img
                                                    src="{{ asset('storage/'.$product->images->first()->full) }}"
                                                    alt=""
                                                /></a>
                                                </div>
                                            @else
                                                <div class="box-images">
                                                <a class="product-image" href="{{ route('product.show', $product->slug) }}" title=""
                                                    ><img
                                                    src="https://via.placeholder.com/176"
                                                    alt=""
                                                /></a>
                                                </div>
                                            @endif
                                            <div class="product-shop">
                                            <h2 class="product-name">
                                                <a href="{{ route('product.show', $product->slug) }}" title=""
                                                >{{$product->name}}</a
                                                >
                                            </h2>
                                            @if ($product->sub_name != '')
                                                
                                                <div class="sub-name">{{$product->sub_name}}</div>
                                            @endif
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ config('settings.currency_symbol').$product->price }}</span>
                                                </p>
                                                @if ($product->sale_price !=0)
                                                    <p class="old-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{{ config('settings.currency_symbol').$product->sale_price }}</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <ul class="add-to-links">
                                                <li class="cart">
                                                <a href="{{route('product.add.cart.sku',$product->sku)}}" class="view-link" title=""
                                                    >Tambah ke <i class="fa fa-shopping-cart"></i
                                                ></a>
                                                </li>
                                                <li class="wishlist"></li>
                                            </ul>
                                            </div>
                                            <!-- <div class="label-sale">
                                                    -25%
                                                    </div> -->
                                        </div>
                                        <!--end item-inner -->
                                      </div>
                                    @empty
                                        <p>No products found </p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-25 col-sidebar-left  col-col-left">
                  @include('site.core.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
