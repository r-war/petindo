@extends('site.core.master')
@section('title', 'Login')
    
@section('content')
    <section class="main-home">
        <div class="container">
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-md-12">
                <div class="breadcrumb-grid breadcrumb-about">
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">Login</a></li>
                    </ul>
                </div>
                </div>
                <!-- end breadcrumb -->
            </div>
            <div class="row container">
                <div class="col-md-6 mx-auto">
                    <form class="form-login"  method="post" action="{{route('login')}}" accept-charset="utf-8">
                        @csrf
                        <div class="form-login-text">
                        <p><span>Please log in below:</span></p>
                        <div class="form-group">
                            <label >email <span>*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Password <span>*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <p class="forgotpass"><a href="" title="">Forgot your password ? </a></p> --}}
                        <p class="forgotpass">Don't Have Account? <a href="{{route('register')}}" class="font-weight-bold" title="">Register </a></p>
                        </div>
                        
                        <input type="submit" class="button-form " >
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
