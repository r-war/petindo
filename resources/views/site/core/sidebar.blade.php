<div class="main-home-left-sidebar main-grid-left-sidebar">
    <!-- categories-left -->
    <div class="widget-v2 categories-left">
      <aside class="categories-grid-inner">
        <div class="sb-title ">
          <h4>Kategori</h4>
        </div>
        <div class="categories-nav">
          <div class="toggle-dropdown-menu">
            <ul>
              @foreach ($categories as $item)
              @if ($item->id !=1)
                <li class="lever0">
                  <a href="{{route('category.show',$item->slug)}}"><span>{{$item->name}}</span></a>
                </li>
              @endif
            @endforeach
            </ul>
          </div>
        </div>
      </aside>
    </div>
    <!--end categories-left -->
    <!--start shop by -->
    <aside class="widget-v2 shopby">
      <div class="sb-title ">
        <h4>Shop by</h4>
      </div>
      <div class="shopby-inner">
        <div class="shopby-widget">
          <h3>Brand</h3>
          <ul>
            @foreach ($brands as $brand)
            <li>
              <a href="{{route('brand.show',$brand->slug)}}">{{$brand->name}}<span class="count">({{$brand->products->count()}})</span></a>
            </li>
            @endforeach
          </ul>
        </div>
        {{-- <div class="shopby-widget">
          <h3>Price</h3>
          <div class="f-price">
            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 60%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 60%;"></a></div>
            <span><strong id="amount">$0 &gt; $300</strong></span>
            <button class="btn btn-dashed textup" type="button">
              Search
            </button>
          </div>
        </div> --}}
      </div>
    </aside>
    <!--end -->
</div>