@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Dashboard</div>

                    <div class="panel-body">
                        You are Home!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
