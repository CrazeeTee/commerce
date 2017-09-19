@extends('layouts.app-moderator')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile</div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name:</dt>
                            <dd>{{ $admin->getFullName() }}</dd>

                            <dt>From:</dt>
                            <dd>{{ $admin->getLocation() }}</dd>

                            <dt>Address:</dt>
                            <dd>{{ $admin->getAddress() }}</dd>
                        </dl>
                    </div>

                    <div class="panel-footer">
                        @if(Auth::user()->unique === $admin->unique)
                            <p class="text-right"><a href="{{ route('moderator.edit', ['admin' => Auth::user()->unique]) }}" class="btn btn-info">Edit Profile</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
