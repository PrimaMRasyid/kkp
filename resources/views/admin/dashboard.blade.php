@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-3 col-md-offset-3" align="center">
                            <a href="{{ route('user') }}">
                                <i class="fa fa-users fa-2x" aria-hidden="true"></i><br/><br/>
                                <span class="glyphicon-class">Data User</span>
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3" align="center">
                            <a href="#">
                                <i class="fa fa-database fa-2x" aria-hidden="true"></i><br/><br/>
                                <span class="glyphicon-class">Data Master</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
