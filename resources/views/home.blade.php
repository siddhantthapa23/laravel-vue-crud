@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-right">
                        <router-link :to="{name: 'clubsIndex'}" class="btn btn-success">Club List</router-link>
                    </div>
                    <h3 class="panel-title-style"><b>Dashboard</b></h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
