@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data User</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hovered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No. ID</th>
                                    <th>No. NPWP</th>
                                    <th>Approved</th>
                                    <th>Action</th>
                                </tr>
                                    @forelse($users as $user)
                                    <tr>
                                        <td></td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->no_id !!}</td>
                                        <td>{!! $user->no_npwp !!}</td>
                                        <td>{!! $user->isApproved() !!}</td>
                                        <td><a href="{!! route('user.show', ['id'=>$user->id]) !!}">detail</a></td>
                                    <tr>
                                    @empty
                                    <tr>
                                        <th colspan="6">No Data Found</th>
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
