@extends('admin.core.master')
@section('title') {{$pageTitle}} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.core.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.banners.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="index">index <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('index') is-invalid @enderror" type="text" name="index" id="index" value="{{ old('index') }}"/>
                            @error('index') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">banner picture <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture"/>
                            @error('picture') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">URL </label>
                            <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('url') }}"/>
                            @error('url') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" checked type="checkbox" id="show" name="show"/> show
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save banner</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.banners.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection