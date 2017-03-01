@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Ikan - {!! $fish->name !!}</div>

                <div class="panel-body">
                    <div class="row">
                        <dl class="dl-horizontal">
                          <dt>HS Code</dt>
                          <dd>{!! $fish->hs_code !!}</dd>

                           <dt>Name</dt>
                          <dd>{!! $fish->name !!}</dd>

                           <dt>Latin Name</dt>
                           <dd>{!! $fish->latin_name !!}</dd>

                            <dt>Size</dt>
                            <dd>{!! $fish->size !!}</dd>

                            <dt>Qty</dt>
                            <dd>{!! $fish->qty !!}</dd>

                            <dt>Unit</dt>
                            <dd>{!! $fish->unit !!}</dd>

                            <dt>Value</dt>
                            <dd>{!! $fish->value !!}</dd>

                            <dt>Fish Type</dt>
                            <dd>{!! $fish->type !!}</dd>
                            <hr/>
                            <dt></dt>
                            <dd>
                                <a href="{!! route('fish') !!}" class="btn btn-sm btn-default pull-right" style="margin-right: 10px">Go Back</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
