@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Profile - <strong>Edit</strong> </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('shop.edit', ['shop' => Auth::user()->unique]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') ?: Auth::user()->first_name }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') ?: Auth::user()->last_name }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') ?: Auth::user()->address1 }}" required>

                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="col-md-4 control-label">Address2 (Optional)</label>

                                <div class="col-md-6">
                                    <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') ?: Auth::user()->address2 }}">

                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                <label for="zip" class="col-md-4 control-label">Zip</label>

                                <div class="col-md-6">
                                    <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') ?: Auth::user()->zip }}" required>

                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                <label for="town" class="col-md-4 control-label">Town</label>

                                <div class="col-md-6">
                                    <input id="town" type="text" class="form-control" name="town" value="{{ old('town') ?: Auth::user()->town }}" required>

                                    @if ($errors->has('town'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="col-md-4 control-label">County</label>

                                <div class="col-md-6">
                                    <input id="county" type="text" class="form-control" name="county" value="{{ old('county') ?: Auth::user()->county }}" required>

                                    @if ($errors->has('county'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country" value="{{ old('country') ?: Auth::user()->country }}" required>

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>

                                    <a href="{{ route('shop.avatar', ['shop' => Auth::user()->unique]) }}" class="btn btn-primary">Upload Profile pic</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
