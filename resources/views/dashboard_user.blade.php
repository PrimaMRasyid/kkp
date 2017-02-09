@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-md-offset-3" align="center">
                            <a href="{{ route('form.add') }}">
                                <i class="fa fa-wpforms fa-2x" aria-hidden="true"></i><br/><br/>
                                <span class="glyphicon-class">Submit Form</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <hr/>
                        <h4 class="text-center">Data History</h4>
                        <br><br>
                        <table class="table table-striped table-hovered">
                            <tr>
                                <th>No</th>
                                <th>Nama Umum</th>
                                <th>Ukuran</th>
                                <th>Qty</th>
                                <th>Status Pembayaran</th>
                            </tr>
                                @forelse($formData as $data)
                                <tr>
                                    <td></td>
                                    <td>{!! $data->nama_umum !!}</td>
                                    <td>{!! $data->ukuran !!}</td>
                                    <td>{!! $data->qty !!}</td>
                                    <td>-</td>
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
