@if(session('info'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info">
                {!! session('info') !!}
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-warning">
                {!! session('warning') !!}
            </div>
        </div>
    </div>
@endif

@if(session('danger'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                {!! session('danger') !!}
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        </div>
    </div>
@endif

@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif