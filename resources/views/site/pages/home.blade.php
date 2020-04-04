@extends('site.core.master')
@section('title', 'Homepage')

@section('content')
    <div class="wide_layout relative w_xs_auto">
        <section class="revolution_slider">
            <div class="r_slider1">
                <ul>
                    @foreach ($banners as $item)
                        <li class="f_left" data-transition="cube" data-slotamount="7">
                            <img
                            src="{{asset('storage/'.$item->picture)}}"
                            alt=""
                            data-bgrepeat="no-repeat"
                            data-bgfit="cover"
                            data-bgposition="center center"
                            />
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
    <section class="main-home main-home-v1">
        <!-- Category -->
        <div class="section">
            <div class="row">
                <div class="bx-title yellow">
                <span>01</span>
                <h2 class="title-user">KATEGORI</h2>
                </div>
            </div>

            <div class="row mgb30 ">
                <div class="banner-section-yellow">
                    @foreach ($categories as $item)
                        @if ($item->id != 1)
                        <div
                            class="col-md-3 col-sm-3 banner-section banner-section-left"
                            style="background: #{{$item->color}} !important"
                        >
                            <img
                                class="img-responsive"
                                src="{{asset('storage/'.$item->image)}}"
                                alt=""
                            />
                            <div class="content">
                                <h2 class="first">{{$item->name}}</h2>
                                <!-- <h2 class="second">Equipment</h2> -->
                                <a class="view-link" href="{{route('category.show', $item->slug)}}">View all</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end Category -->

        <!-- best seller -->
        <div class="section">
            <div class="row">
                <div class="bx-title red">
                <span>02</span>
                <h2 class="title-user">REKOMENDASI KAMI</h2>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="popularproduct ">
                    <div class="products-grid">
                    <!-- Swiper -->
                    <div class="swiper-container" id="popularproduct">
                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                                @if ($product->featured == 1)
                                    <div
                                        class="swiper-slide wow fadeInUp animated "
                                        data-wow-duration="1s"
                                        data-wow-delay="100ms"
                                    >
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End best seller -->
        <!-- Brand -->
        <div class="section">
            <div class="row mb-20">
              <div class="bx-title black">
                <span>03</span>
                <h2 class="title-user">BRAND KAMI</h2>
              </div>
            </div>
            <div class="row">
                @foreach ($brands as $item)
                    <div class="col-md-2 col-sm-3 col-xs-4 mb-20">
                        <a href="{{route('brand.show',$item->slug)}}">
                            <img src="{{asset('storage/'.$item->logo)}}" alt="" class="img-responsive">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!--News -->
    <div class="section">
        <div class="row">
            <div class="bx-title oranges">
            <span>04</span>
            <h2 class="title-user">BLOG</h2>
            </div>
        </div>
        <div class="blog-wrapper ">
            <div class="container-fluid">
            <div class="row">
                <div class="blog-wapper-content">
                <div
                    class="col-md-6 blog-wapper-left wow slideInLeft animated "
                    data-wow-duration="1s"
                    data-wow-delay="100ms"
                >
                    <div class="row">
                    <div class="col-sm-6 ">
                        <div class="box-img scale">
                        <img alt="blog" src="https://www.pethouse.co.id/cfind/source/images/hewan-peliharaan.png" />
                        </div>
                    </div>
                    <div class="col-sm-6 box-content">
                        <div class="box-info">
                        <!-- <span class="show-cat">
                            Sport Shoes
                        </span> -->
                        <a class="post-name" href=""
                            >Hewan Peliharaan Unik, Lucu, Mudah dipelihara di Rumah dan Cara Perawatannya
                        </a>
                        <div class="time-line">
                            <div class="date">
                            <i class="fa fa-calendar"></i>39 Minutes Ago
                            </div>
                            <!-- <div class="comment">
                            <i class="fa fa-comment-o"></i
                            ><a href="">20 Comments</a>
                            </div> -->
                        </div>
                        <div class="post-content">
                            <p>
                            Memelihara hewan peliharaan di rumah tentunya menjadi hobbi tersendiri bagi sejumlah orang...
                            </p>
                        </div>
                        <a
                            class="view-more view-more-v1 hover-rhv-float"
                            href=""
                            >selengkapnya</a
                        >
                        </div>
                    </div>
                    </div>
                </div>
                <div
                    class="col-md-6 blog-wapper-left wow slideInRight animated "
                    data-wow-duration="1s"
                    data-wow-delay="100ms"
                >
                    <div class="row">
                    <div class="col-sm-6 ">
                        <div class="box-img scale">
                        <img alt="blog" src="https://cdn02.indozone.id/re/content/2020/03/03/Pjsgvp/t_5e5e28fe063c1.jpg?w=700&q=85" />
                        </div>
                    </div>
                    <div class="col-sm-6 box-content ">
                        <div class="box-info">
                        <a class="post-name" href=""
                            >Belum Ada Bukti Penularan Covid-19 dari Hewan Peliharaan ke Manusia
                        </a>
                        <div class="time-line">
                            <div class="date">
                            <i class="fa fa-calendar"></i>39 Minutes Ago
                            </div>
                            <!-- <div class="comment">
                            <i class="fa fa-comment-o"></i
                            ><a href="">20 Comments</a>
                            </div> -->
                        </div>
                        <div class="post-content">
                            <p>
                            Masyarakat tak perlu panik meski Indonesia sudah ada pasien positif terjangkit Covid-19...
                            </p>
                        </div>
                        <a
                            class="view-more view-more-v1 hover-rhv-float"
                            href=""
                            >selengkapnya</a
                        >
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- End News -->
@endsection

@push('scripts')


@endpush