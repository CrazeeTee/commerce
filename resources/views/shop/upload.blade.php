@extends('layouts.app-shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->getFullName() }}'s Uploads</div>

                    <div class="panel-body">
                        Uploads!

                        <br>

                        <form class="form-horizontal" method="POST" action="{{ route('shop.upload', Auth::user()->unique) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Product Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" cols="3" placeholder="Description of Product (Optional)" autocomplete="off">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                <label for="size" class="col-md-4 control-label">Product Size:</label>

                                <div class="col-md-6">
                                    <select  id="size" name="size" class="form-control" required>
                                        <option value="">Choose SIZE</option>
                                        <option value="none">Uncategorized</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                        <option value="x_large">Extra Large(XL)</option>
                                        <option value="xx_large">XX Large(XXL)</option>
                                    </select>

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="color" class="col-md-4 control-label">Product Color:</label>

                                <div class="col-md-6">
                                    <select id="color" name="color" class="form-control" required>
                                        <option value="">Choose COLOR</option>
                                        <option value="none">Uncategorized</option>
                                        <option value="red">Red</option>
                                        <option value="orange">Orange</option>
                                        <option value="yellow">Yellow</option>
                                        <option value="green">Green</option>
                                        <option value="blue">Blue</option>
                                        <option value="brown">Brown</option>
                                        <option value="indigo">Indigo</option>
                                        <option value="purple">Purple</option>
                                        <option value="pink">Pink</option>
                                        <option value="black">Black</option>
                                        <option value="white">White</option>
                                    </select>

                                    @if ($errors->has('color'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_price') ? ' has-error' : '' }}">
                                <label for="new_price" class="col-md-4 control-label">Current Price:</label>

                                <div class="col-md-6">
                                    <input id="new_price" type="text" class="form-control" name="new_price" value="{{ old('new_price') }}" required>

                                    @if ($errors->has('new_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('old_price') ? ' has-error' : '' }}">
                                <label for="old_price" class="col-md-4 control-label">Old Price:</label>

                                <div class="col-md-6">
                                    <input id="old_price" type="text" class="form-control" name="old_price" value="{{ old('old_price') }}" placeholder="Optional">

                                    @if ($errors->has('old_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                <label for="stock" class="col-md-4 control-label">Stock:</label>

                                <div class="col-md-6">
                                    <input id="stock" type="number" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="Number of available products" required>

                                    @if ($errors->has('stock'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required>

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload Product
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