@extends('layouts.app-moderator')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Moderators</div>

                    <div class="panel-body">
                        Here are Moderators! <a class="btn btn-info btn-sm" href="{{ route('admin.register') }}">Become a Moderator</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
