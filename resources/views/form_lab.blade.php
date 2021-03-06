@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Transaction #{!! $form->id !!}</div>

                <div class="panel-body">
                    <div class="row">
                        <dl class="dl-horizontal">
                          <div class="col-md-offset-5">
                          @if($form->status_test == 1)
                            {!! $barcode !!}
                          @endif
                            <span class="small">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;form #{{ $form->id }}</span>
                          </div>
                          <dt>Pengirim</dt>
                          <dd>{!! $form->sender !!}</dd>

                           <dt>Alamat Pengirim</dt>
                          <dd>{!! $form->sender_address !!}</dd>

                           <dt>Jenis Komoditas</dt>
                           <dd>{!! $form->jenis_komoditas !!}</dd>

                            <dt>Peruntukan</dt>
                            <dd>{!! $form->peruntukan !!}</dd>

                            <dt>Nama Umum</dt>
                            <dd>{!! $form->nama_umum !!}</dd>

                            <dt>Ukuran</dt>
                            <dd>{!! $form->ukuran !!}</dd>

                            <dt>Qty</dt>
                            <dd>{!! $form->qty !!}</dd>

                            <dt>Satuan</dt>
                            <dd>{!! $form->satuan !!}</dd>

                            <dt>Keterangan</dt>
                            <dd>{!! $form->keterangan !!}</dd>
                            <hr/>
                            <h4 class="text-center">Detail Penerima</h4>
                            <dt>Penerima</dt>
                            <dd>{!! $form->receiver !!}</dd>
                            <dt>Alamat Penerima</dt>
                            <dd>{!! $form->receiver_address !!}</dd>
                            <dt></dt>
                            <dd>
                            {!! auth()->user()->isUserbank() ? '<a href="'.route('bank.paid', ['id' => $form->id]).'" class="btn btn-sm btn-success">Set Paid</a>' : '' !!}
                            {!! auth()->user()->isUserlab() ? '<a href="'.route('lab.test', ['id' => $form->id]).'" class="btn btn-sm btn-success">Proses Test</a>' : '' !!}
                            <a href="{!! route('lab.home') !!}" class="btn btn-sm btn-default pull-right" style="margin-right: 10px">Go Back</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
