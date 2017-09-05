@if(Session::has('info'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info">
                {!! Session::get('info') !!}
            </div>
        </div>
    </div>
@endif

@if(Session::has('success'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
        </div>
    </div>
@endif

@if(Session::has('warning'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-warning">
                {!! Session::get('warning') !!}
            </div>
        </div>
    </div>
@endif

@if(Session::has('danger'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                {!! Session::get('danger') !!}
            </div>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                {!! Session::get('error') !!}
            </div>
        </div>
    </div>
@endif