@extends('admin.core.master')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form action="{{ route('admin.orders.update') }}" method="POST">
                    @csrf
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                            </div>
                            <div class="col-6">
                                <h5 class="text-right">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-6">Placed By
                                <address><strong>{{ $order->user->fullName }}</strong><br>Email: {{ $order->user->email }}</address>
                            </div>
                            <div class="col-6">Ship To
                                <address><strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>{{ $order->address }}<br>{{ $order->city }}, {{ $order->country }} {{ $order->post_code }}<br>{{ $order->phone_number }}<br></address>
                            </div>
                            <div class="col-12 mt-4">
                                <b>Order ID:</b> {{ $order->order_number }}<br>
                                <b>Amount:</b> {{ config('settings.currency_symbol') }} {{ round($order->grand_total, 2) }}<br><br>
                                {{-- <div class="form-group">
                                    <label class="control-label" for="payment_method">Payment Method <span class="m-l-5 text-danger"> *</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $order->payment_method) }}"/>
                                    @error('payment_method') {{ $message }} @enderror
                                </div> --}}
                                <input type="hidden" name="order_number" value="{{$order->order_number}}">
                                <div class="form-group">
                                    <label for="payment_status">Payment Status :<span class="m-l-5 text-danger"> </span></label>
                                    <select id=parent class="form-control custom-select mt-15 @error('payment_status') is-invalid @enderror" name="payment_status">
                                        <option value="0">Not Completed</option>
                                        <option value="1" {{$order->payment_status == 1 ? 'selected' :''}}
                                        >Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_status">Order Status :<span class="m-l-5 text-danger"> </span></label>
                                    <select id=parent class="form-control custom-select mt-15 @error('status') is-invalid @enderror" name="status">
                                        @foreach ($status as $item)
                                        <option value="{{$item}}" {{$item == $order->status ? "selected" : ""}} >{{ $item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <b>Payment Status:</b> {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }}<br>
                                <b>Order Status:</b> {{ $order->status }}<br> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>SKU #</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->product->sku }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ config('settings.currency_symbol') }}{{ round($item->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Order</button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection