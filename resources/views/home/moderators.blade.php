@extends('layouts.app-moderator')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Moderators</div>

                    <div class="panel-body">
                        <p class="text-right"><a href="{{ route('admin.register') }}" class="btn btn-info btn-sm">Become a Moderator</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
