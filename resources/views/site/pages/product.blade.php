@extends('site.core.master')
@section('title', $product->name)
@section('content')
    <section class="main-home">
        <div class="container">
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-md-12">
                <div class="breadcrumb-grid ">
                    <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="/shop">shop</a></li>
                    <li class="active"><a href="#">{{$product->name}}</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="row product-viewer">
                <div class="col-md-7 col-xs-12">
                  <div class="product-viewer-left">
                    <div class="product-viewer-left-img-big">
                      <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @if ($product->images->count() > 0)
                                @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <img
                                    class="zoom_01"
                                    src="{{asset('storage/'.$image->full)}}"
                                    alt=""
                                    data-zoom-image="{{asset('storage/'.$image->full)}}"
                                  />
                                </div>
                                @endforeach
                              @endif
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                      </div>
                    </div>
                    <div class="product-viewer-left-img-small">
                        <div class="swiper-container gallery-thumbs">
                          <div class="swiper-wrapper">
                            @foreach($product->images as $image)
                            <div class="swiper-slide">
                              <img
                                src="{{asset('storage/'.$image->full)}}"
                                alt=""
                              />
                            </div>
                            @endforeach
                          </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <div class="product-viewer-right">
                      <h2 class="product-name">
                        <a href="" title="">{{$product->name}}</a>
                      </h2>
                      {{-- <div class="sub-name">Pouch Wet Food</div> --}}
                      <div class="price-box">
                        <p>{{config('settings.currency_symbol').' '. number_format($product->price)}}</p>
                      </div>
                      {{-- <div class="name-detail">
                        <p>
                          Diracik dengan resep yang lezat, serta potongan daging segar dan dilengkapi dengan kandungan air, membuat ketagihan kucingmu!
                        </p>
                      </div> --}}
                      <div class="clearfix"></div>
                      {{-- <p class="available">Ketersediaan: Stock</p> --}}
                      <div class="add-cart-wishlist-compare">
                        <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart" class="form-inline">
                            @csrf
                            <div class="form-group">
                                <label for="qty">QTY :</label>
                                <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" >
                            </div>
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                            <div class="form-group">
                                <div class="add-cart">
                                <input
                                  value="Tambah ke keranjang"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Tambah ke keranjang"
                                  class="submit button dark"
                                  id="submit"
                                  name="submit"
                                  type="submit"
                                />
                            </div>
                        </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                        <a
                            href="#home"
                            aria-controls="home"
                            role="tab"
                            data-toggle="tab"
                        >
                            Deskripsi</a
                        >
                        </li>
                    </ul>
    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="description-box">
                            {{$product->description}}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    @if ($product->images->count() > 0)
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset('storage/'.$product->images->first()->full) }}" data-fancybox="">
                                                    <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="img-big-wrap">
                                            <div>
                                                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                                            </div>
                                        </div>
                                    @endif
                                     @if ($product->images->count() > 0)
                                        <div class="img-small-wrap">
                                            @foreach($product->images as $image)
                                                <div class="item-gallery">
                                                    <img src="{{ asset('storage/'.$image->full) }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <dl class="row">
                                        <dt class="col-sm-3">SKU</dt>
                                        <dd class="col-sm-9">{{ $product->sku }}</dd>
                                        <dt class="col-sm-3">Weight</dt>
                                        <dd class="col-sm-9">{{ $product->weight }}</dd>
                                    </dl>
                                    <div class="mb-3">
                                        @if ($product->sale_price > 0)
                                            <var class="price h3 text-danger">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->sale_price }}</span>
                                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                                            </var>
                                        @else
                                            <var class="price h3 text-success">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                                            </var>
                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    @foreach($attributes as $attribute)
                                                        @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                        @if ($attributeCheck)
                                                            <dt>{{ $attribute->name }}: </dt>
                                                            <dd>
                                                                <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                                    <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                                                                    @foreach($product->attributes as $attributeValue)
                                                                        @if ($attributeValue->attribute_id == $attribute->id)
                                                                            <option
                                                                                data-price="{{ $attributeValue->price }}"
                                                                                value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </dd>
                                                        @endif
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Quantity: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                    </form>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <article class="card mt-4">
                    <div class="card-body">
                        {!! $product->description !!}
                    </div>
                </article>
            </div>
        </div>
    </section> --}}

@stop

@push('scripts')
<script src="{{asset('frontend/js/jquery.elevatezoom.js')}}"></script>
<script src="{{asset('frontend/js/detail-product.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush