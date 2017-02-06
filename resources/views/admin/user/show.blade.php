@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail User - {!! $user->name !!}</div>

                <div class="panel-body">
                    <div class="row">
                        <dl class="dl-horizontal">
                          <dt>Name</dt>
                          <dd>{!! $user->name !!}</dd>

                           <dt>Email</dt>
                          <dd>{!! $user->email !!}</dd>

                           <dt>Address</dt>
                           <dd>{!! $user->alamat !!}</dd>

                            <dt>No. ID</dt>
                            <dd>{!! $user->no_id !!}</dd>

                            <dt>No. SKIB</dt>
                            <dd>{!! $user->no_skib !!}</dd>

                            <dt>SKIB Date</dt>
                            <dd>{!! $user->tgl_skib !!}</dd>

                            <dt>No. Surveilance</dt>
                            <dd>{!! $user->no_surveilance !!}</dd>

                            <dt>Surveilance Date</dt>
                            <dd>{!! $user->tgl_surveilance !!}</dd>
                            <hr/>
                            <dt></dt>
                            <dd>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Approve</a>
                                <a href="#" class="btn btn-sm btn-danger">Decline</a>

                                <a href="{!! route('user') !!}" class="btn btn-sm btn-default pull-right" style="margin-right: 10px">Go Back</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approve User</h4>
      </div>
      <div class="modal-body">
        Are you sure to approve this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
