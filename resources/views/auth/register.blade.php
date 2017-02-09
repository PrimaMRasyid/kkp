@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url()->current() }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="role" value="{{ url()->current() }}">
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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <hr/>

                        <h4 class="text-center">Detail User</h4>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-3 control-label">Address</label>

                            <div class="col-md-7">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_id') ? ' has-error' : '' }}">
                            <label for="no_id" class="col-md-3 control-label">No. ID</label>

                            <div class="col-md-7">
                                <input id="no_id" type="text" class="form-control" name="no_id" value="{{ old('no_id') }}" required autofocus>

                                @if ($errors->has('no_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_npwp') ? ' has-error' : '' }}">
                            <label for="no_npwp" class="col-md-3 control-label">No.  NPWP</label>

                            <div class="col-md-7">
                                <input id="no_npwp" type="text" class="form-control" name="no_npwp" value="{{ old('no_npwp') }}" required autofocus>

                                @if ($errors->has('no_npwp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_npwp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_skib') ? ' has-error' : '' }}">
                            <label for="no_skib" class="col-md-3 control-label">No. SKIB</label>

                            <div class="col-md-4">
                                <input id="no_skib" type="text" class="form-control" name="no_skib" value="{{ old('no_skib') }}" required autofocus>

                                @if ($errors->has('no_skib'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_skib') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <input id="tgl_skib" type="date" class="form-control" name="tgl_skib" value="{{ old('tgl_skib') }}" required autofocus>

                                @if ($errors->has('tgl_skib'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_skib') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_surveilance') ? ' has-error' : '' }}">
                            <label for="no_surveilance" class="col-md-3 control-label">No. Surveilance</label>

                            <div class="col-md-4">
                                <input id="no_surveilance" type="text" class="form-control" name="no_surveilance" value="{{ old('no_surveilance') }}" required autofocus>

                                @if ($errors->has('no_surveilance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_surveilance') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <input id="tgl_surveilance" type="date" class="form-control" name="tgl_surveilance" value="{{ old('tgl_surveilance') }}" required autofocus>

                                @if ($errors->has('tgl_surveilance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_surveilance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
