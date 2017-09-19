@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile pic - <strong>Edit</strong> </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('expert.avatar', ['expert' => Auth::user()->unique]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">Profile Pic</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') ?: Auth::user()->avatar }}" required>

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload Profile pic
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
