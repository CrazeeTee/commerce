@extends('layouts.app-shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Shops</div>

                    <div class="panel-body">
                        Here are Shops! <a class="btn btn-info btn-sm" href="{{ route('shop.register') }}">Have your own Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
