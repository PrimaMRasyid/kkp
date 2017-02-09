@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Ikan <span class="pull-right"><a href="{!! route('fish.add') !!}">Add Data</a></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hovered">
                                <tr>
                                    <th>No</th>
                                    <th>HS Code</th>
                                    <th>Nama Lokal</th>
                                    <th>Nama Latin</th>
                                    <th>Action</th>
                                </tr>
                                    @forelse($fishs as $fish)
                                    <tr>
                                        <td></td>
                                        <td>{!! $fish->hs_code !!}</td>
                                        <td>{!! $fish->name !!}</td>
                                        <td>{!! $fish->latin_name !!}</td>
                                        <td><a href="{!! route('fish.show', ['id'=>$fish->id]) !!}">detail</a></td>
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
</div>
@endsection
