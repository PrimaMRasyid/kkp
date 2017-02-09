@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Transaction</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('form.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('sender') ? ' has-error' : '' }}">
                            <label for="sender" class="col-md-3 control-label">Pengirim</label>

                            <div class="col-md-7">
                                <input id="sender" type="text" class="form-control" name="sender" value="{{ $user->name }}" required autofocus readonly="">

                                @if ($errors->has('sender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sender_address') ? ' has-error' : '' }}">
                            <label for="sender_address" class="col-md-3 control-label">Alamat Pengirim</label>

                            <div class="col-md-7">
                                <input id="sender_address" type="text" class="form-control" name="sender_address" value="{{ $user->alamat }}" required autofocus readonly="">

                                @if ($errors->has('sender_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sender_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_komoditas') ? ' has-error' : '' }}">
                            <label for="jenis_komoditas" class="col-md-3 control-label">Jenis Komoditas</label>

                            <div class="col-md-7">
                                <input id="jenis_komoditas" type="text" class="form-control" name="jenis_komoditas" value="{{ old('jenis_komoditas') }}" required autofocus>

                                @if ($errors->has('jenis_komoditas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_komoditas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('peruntukan') ? ' has-error' : '' }}">
                            <label for="peruntukan" class="col-md-3 control-label">Peruntukan</label>

                            <div class="col-md-7">
                                <input id="peruntukan" type="text" class="form-control" name="peruntukan" value="{{ old('peruntukan') }}" required autofocus>

                                @if ($errors->has('peruntukan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('peruntukan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_umum') ? ' has-error' : '' }}">
                            <label for="nama_umum" class="col-md-3 control-label">Nama Umum</label>

                            <div class="col-md-7">
                                <input id="nama_umum" type="text" class="form-control" name="nama_umum" value="{{ old('nama_umum') }}" required autofocus>

                                @if ($errors->has('nama_umum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_umum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ukuran') ? ' has-error' : '' }}">
                            <label for="ukuran" class="col-md-3 control-label">Ukuran</label>

                            <div class="col-md-7">
                                <input id="ukuran" type="text" class="form-control" name="ukuran" value="{{ old('ukuran') }}" required autofocus>

                                @if ($errors->has('ukuran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ukuran') }}</strong>
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

                        <div class="form-group{{ $errors->has('satuan') ? ' has-error' : '' }}">
                            <label for="satuan" class="col-md-3 control-label">Satuan</label>

                            <div class="col-md-7">
                                <input id="satuan" type="text" class="form-control" name="satuan" value="{{ old('satuan') }}" required autofocus>

                                @if ($errors->has('satuan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-3 control-label">Keterangan</label>

                            <div class="col-md-7">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{!! url('home') !!}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
