<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Discount Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label" for="shipping_min">Min. for shipping</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site name"
                        id="shipping_min"
                        name="shipping_min"
                        value="{{ config('settings.shipping_min') }}"
                    />
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="shipping">shipping value</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site name"
                        id="shipping"
                        name="shipping"
                        value="{{ config('settings.shipping') }}"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label" for="shipping_min">Min. for shipping</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site name"
                        id="shipping_min"
                        name="shipping_min"
                        value="{{ config('settings.shipping_min') }}"
                    />
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="shipping">shipping value</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site name"
                        id="shipping"
                        name="shipping"
                        value="{{ config('settings.shipping') }}"
                    />
                </div>
            </div>
            {{-- <div class="form-group">
                <label class="control-label" for="site_title">Site Title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="site_title"
                    name="site_title"
                    value="{{ config('settings.site_title') }}"
                />
            </div> --}}
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>