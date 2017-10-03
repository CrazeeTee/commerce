@extends('layouts.app-expert')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile</div>

                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name:</dt>
                            <dd>{{ $expert->getFullName() }}</dd>

                            <dt>From:</dt>
                            <dd>{{ $expert->getLocation() }}</dd>

                            <dt>Address:</dt>
                            <dd>{{ $expert->getAddress() }}</dd>
                        </dl>
                    </div>

                    <div class="panel-footer">
                        @if(Auth::user()->unique === $expert->unique)
                            <p class="text-right"><a href="{{ route('expert.edit', Auth::user()->unique) }}" class="btn btn-info">Edit Profile</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
