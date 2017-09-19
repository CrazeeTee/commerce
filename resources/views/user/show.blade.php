@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile</div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name:</dt>
                            <dd>{{ $user->getFullName() }}</dd>

                            <dt>From:</dt>
                            <dd>{{ $user->getLocation() }}</dd>

                            <dt>Address:</dt>
                            <dd>{{ $user->getAddress() }}</dd>
                        </dl>
                    </div>

                    <div class="panel-footer">
                        @if(Auth::user()->unique === $user->unique)
                            <p class="text-right"><a href="{{ route('user.edit', ['user' => Auth::user()->unique]) }}" class="btn btn-info">Edit Profile</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
