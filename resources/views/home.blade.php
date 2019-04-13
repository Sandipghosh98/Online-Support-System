@extends('layouts.app')

@section('title','Dashboard')
    

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{__('lang.dashboard')}}</div>

                <div class="card-body">
                <p>{{__('lang.loggedin')}}</p>
                    

                    @if (Auth::user()->is_admin)
                        <p>
                        {{__('lang.See all')}} <a href="{{ url('admin/tickets') }}">{{__('lang.tickets')}}</a>
                        </p>
                    @else
                        <p>
                            {{__('lang.See all')}} <a href="{{ url('my_tickets') }}"> {{__('lang.tickets')}}</a> {{__('lang.or')}} <a href="{{ url('new_ticket') }}">{{__('lang.open new ticket')}}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
