@extends('layouts.admin')
@section('pagename')
    Dashboard
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}s
                    @endif
                        
                    @if (Auth::user()->acc_type == 4)
                        <span>You log as Super Admin {{Auth::user()->username}}</span>
                    @elseif (Auth::user()->act_typ == 1)
                        <span>You log as Super Agent {{Auth::user()->username}}</span>
                    @elseif (Auth::user()->acc_type == 2)
                        <span>You log as Agent {{Auth::user()->username}}</span>
                    @elseif (Auth::user()->acc_type == 3)
                        <span>You log as Player {{Auth::user()->username}}</span>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
{{-- <router-link to='/home'>Dashboard</router-link>
<router-link to='/LoadStation'>Load Station</router-link><br><br><br><br> --}}
    <router-view></router-view>
@endsection
