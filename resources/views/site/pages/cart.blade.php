@extends('site.core.master')
@section('title', 'Shopping Cart')
@section('content')
<section class="main-home">
    <div class="container-fluid">
      <div class="row">
        <!-- breadcrumb -->
        <div class="col-md-12">
          <div class="breadcrumb-grid breadcrumb-about">
            <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active"><a href="#">Shoppingcart</a></li>
            </ul>
          </div>
        </div>
        <!-- end breadcrumb -->
      </div>
      <div class="row">
        <div class="col-md-12">
        @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
          <div class="shoppingcart-content ">
            <div class="table-cart table-responsive">
                @if (\Cart::isEmpty())
                    <p class="alert alert-warning">Your shopping cart is empty.</p>
                @else
              <table>
                <thead>
                  <tr>
                    <th>Images</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Grandtotal</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                  <tr>
                    <td>
                      <a href="">
                        <img
                          src="{{asset('storage/'.$item->attributes->picture)}}"
                          width="250"
                        />
                      </a>
                    </td>
                    <td>
                      <div class="name-product-cart">
                        <a href="{{route('product.show', $item->attributes->slug)}}" title="">
                          <span>{{$item->name}}</span></a
                        >
                      </div>
                    </td>
                    <td>
                      <input type="number" class="qty" min="1" data-id="{{$item->id}}" value="{{$item->quantity}}">
                      
                    </td>
                    <td>
                        {{ config('settings.currency_symbol').' '. number_format($item->price) }}
                    </td>
                    <td>{{config('settings.currency_symbol').' '.number_format($item->price * $item->quantity)}}</td>
                    <td>
                      <a href="{{ route('checkout.cart.remove', $item->id) }}" class="remove"
                        ><span class="fa fa-remove"></span>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  <tr class="cart-action">
                    <td colspan="12" rowspan="" headers="">
                      <div class="">
                          <a
                            class="button white pull-right hover-rhv-float"
                            href="{{ route('checkout.cart.clear') }}"
                            >Clear cart</a
                          >
                          <a
                            class="button white pull-left hover-rhv-float"
                            href="/shop"
                            >Continue shopping</a
                          >
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              @endif
            </div>
          </div>
        </div>
        </div>
    
        <div class="row">
            <div class="cart-collaterals">
                <div class="col-md-4 pull-right">
                    <div class="cart-collaterals-total">
                      <p class="sub">Subtotal: <span> {{config('settings.currency_symbol').' '.number_format(\Cart::getSubTotal())}}</span></p>
                      <p class="grand">Grandtotal: <span> {{config('settings.currency_symbol').' '.number_format(\Cart::getSubTotal())}}</span></p>
                      <p class="form-submit">
                        <!-- <input class="button dark hover-rhv-float" value="Procced to Checkout" type="submit"> -->
                        <a class="button hover-rhv-float" href="{{ route('checkout.index') }}" title=""
                          >Procced to Checkout</a
                        >
                      </p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        $('.qty').change(function(){
          //console.log($(this).data('id'));
          $.ajax({
            url : "{{route('checkout.cart.update')}}",
            type: 'POST',
            data: {
              "_token": "{{ csrf_token() }}",
              "id" : $(this).data('id'),
              "qty" : $(this).val()
            },
            success : function(data){
              location.reload();
            }

          })
        })
    </script>
@endpush

@stop

