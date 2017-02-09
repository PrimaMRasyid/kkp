@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Data</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('fish.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('hs_code') ? ' has-error' : '' }}">
                            <label for="hs_code" class="col-md-3 control-label">HS Code</label>

                            <div class="col-md-7">
                                <input id="hs_code" type="text" class="form-control" name="hs_code" value="{{ old('hs_code') }}" required autofocus>

                                @if ($errors->has('hs_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hs_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('latin_name') ? ' has-error' : '' }}">
                            <label for="latin_name" class="col-md-3 control-label">Latin Name</label>

                            <div class="col-md-7">
                                <input id="latin_name" type="text" class="form-control" name="latin_name" value="{{ old('latin_name') }}" required autofocus>

                                @if ($errors->has('latin_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latin_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="size" class="col-md-3 control-label">Size</label>

                            <div class="col-md-7">
                                <input id="size" type="text" class="form-control" name="size" value="{{ old('size') }}" required autofocus>

                                @if ($errors->has('size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                            <label for="qty" class="col-md-3 control-label">Qty</label>

                            <div class="col-md-7">
                                <input id="qty" type="text" class="form-control" name="qty" value="{{ old('qty') }}" required autofocus>

                                @if ($errors->has('qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                            <label for="unit" class="col-md-3 control-label">Unit</label>

                            <div class="col-md-7">
                                <input id="unit" type="text" class="form-control" name="unit" value="{{ old('unit') }}" required autofocus>

                                @if ($errors->has('unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                            <label for="value" class="col-md-3 control-label">Value</label>

                            <div class="col-md-7">
                                <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" required autofocus>

                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{!! route('fish') !!}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
