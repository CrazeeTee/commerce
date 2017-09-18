@extends('layouts.app-expert')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Experts</div>

                    <div class="panel-body">
                        Here are Experts! <a class="btn btn-info btn-sm" href="{{ route('expert.register') }}">Become an Expert</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
