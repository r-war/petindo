      <!-- header -->
      <!-- PAGE HEADER -->
      <header id="header" class="header-v4">
        <div class="header-topbar">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-6 col-sm-6 header-topbarleft">
                <!-- <div class="link-follow">
                  <ul class="list-inline list-instyle">
                    <li>
                      <a href=""><i class="fa fa-skype social"></i></a>
                    </li>
                    <li>
                      <a href=""><i class="fa fa-facebook social"></i></a>
                    </li>
                    <li>
                      <a href=""><i class="fa fa-twitter social"></i></a>
                    </li>
                  </ul>
                </div> -->
              </div>
              <div class="col-xs-12 col-md-6 col-sm-6 header-topbarright">
                <div class="hotline">
                  <p class="hotline">Hotline: 1-800-806-6453</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-content">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-3 logo-mb">
                <div class="header-logo">
                  <a href=""
                    ><img
                      src="{{ asset('storage/'.config('settings.site_logo')) }}"
                      class="img-responsive"
                      alt="logo"
                  /></a>
                </div>
              </div>
              <div class="col-md-7 col-sm-6">
                <div class="header-search header-search1 ">
                  <form method="get" action="{{route('product.search')}}">
                    <div class="input-group">
                      <div class="input-group-btn search-panel" style="font-size:14px">
                        <select name="category" id="category" style="border:0px;outline:0px">
                          <option value="all">All Categories</option>
                          @foreach ($categories as $item)
                            <option value="{{$item->slug}}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="Search ..."
                      />
                      <span class="input-group-btn">
                        <button
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Search"
                          id="btn-submit"
                          class="btn "
                          type="submit"
                        >
                          <img src="{{asset('frontend/images/icon-search.png') }}" alt="" />
                        </button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-2 col-sm-3 cart-search-user-mb">
                <div class="header-cart-user">
                  <div class="search-mb">
                    <a href="#" class="search-header4" title=""
                      ><img src="images/icon-search.png" alt=""
                    /></a>
                  </div>
                  <div class="header-user">
                    <a href="#"><img src="{{asset('frontend/images/icon-user.png')}}" alt=""/></a>
                    <div class="user-info">
                      @guest
                      <a href="{{route('login')}}"><p>login</p></a>
                      <a href="{{route('register')}}"><p>register</p></a>
                      @else
                      {{-- <a href="{{ route('profile') }}">Profile</a> --}}
                      <a href="{{ route('logout') }}"><p>{{ __('Logout') }}</p></a>
                      @endguest
                    </div>
                  </div>
                  <div class="header-cart ">
                    <div class="mini-cart">
                      <a href="{{route('checkout.cart')}}">
                        <img src="{{asset('frontend/images/icon-cart.png')}}" alt="" />
                        <span class="cart-qty">{{$cartCount}}</span>
                      </a>
                      <!-- cart-control -->
                      {{-- <div class="shop-item ">
                        <div class="widget_shopping_cart_content">
                          <ul class="cart-list list-unstyled">
                            @foreach ($carts as $cart)
                              <li class="clearfix">
                                <a class="p-thumb" href="single-product.html">
                                  <img
                                    src="images/home4/products/300x300.jpg"
                                    alt=""
                                  />
                                </a>
                                <div class="p-info">
                                  <a class="p-title" href="#"
                                    >Phasellus Vel Hendrerit</a
                                  >
                                  <div class="price">
                                    <span class="amount">$35.00</span>
                                  </div>
                                  <span class="p-qty">QTY: 01</span>
                                </div>
                              </li>
                            @endforeach
                          </ul>
                          <p class="buttons">
                            <a class="button dark wc-forward" href="{{route('checkout.cart')}}"
                              >View Cart</a
                            >
                          </p>
                        </div>
                      </div> --}}
                      <!--end-cart-control -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- End Header -->