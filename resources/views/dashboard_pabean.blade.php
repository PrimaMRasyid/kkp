@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Lab Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <h4 class="text-center">Data Transaction</h4><br>
                        <form class="form-inline" action="{!! route('pabean.cari') !!}" method="POST">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">Kode Transaksi</label>
                            <div class="input-group">
                              <div class="input-group-addon">#</div>
                              <input type="text" class="form-control" id="exampleInputAmount" name="id_transaksi" placeholder="Kode Transaksi">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Cari Transaksi</button>
                        </form>
                        <br/>
                        <table class="table table-striped table-hovered">
                            <tr>
                                <th>No</th>
                                <th>Pengirim</th>
                                <th>Nama Ikan</th>
                                <th>Nama Umum</th>
                                <th>Ukuran</th>
                                <th>Qty</th>
                                <th>Status Test</th>
                                <th>Status Scan</th>
                                <th>Barcode</th>
                                <th>Detail</th>
                            </tr>
                                @forelse($transactions as $data)
                                <tr>
                                    <td>#{!! $data->id !!}</td>
                                    <td>{!! $data->sender !!}</td>
                                    <td>{!! $data->fish['latin_name'] !!}</td>
                                    <td>{!! $data->nama_umum !!}</td>
                                    <td>{!! $data->ukuran !!}</td>
                                    <td>{!! $data->qty !!}</td>
                                    <td>{!! $data->Testing !!}</td>
                                    <td>{!! $data->Scan !!}</td>
                                    <td>{!! $data->Barcode !!}</td>
                                    <td><a href="{!! route('pabean.detail', ['id' => $data->id]) !!}">Detail</a></td>
                                <tr>
                                @empty
                                <tr>
                                    <th colspan="6" class="text-center">No Data Found</th>
                                </tr>
                                @endforelse
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
