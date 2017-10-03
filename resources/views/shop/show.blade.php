@extends('layouts.app-shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile</div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name:</dt>
                            <dd>{{ $shop->getFullName() }}</dd>

                            <dt>From:</dt>
                            <dd>{{ $shop->getLocation() }}</dd>

                            <dt>Address:</dt>
                            <dd>{{ $shop->getAddress() }}</dd>
                        </dl>
                    </div>

                    <div class="panel-footer">
                        @if(Auth::user()->unique === $shop->unique)
                            <p class="text-right"><a href="{{ route('shop.edit', Auth::user()->unique) }}" class="btn btn-info">Edit Profile</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
