@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
				<i class="fas fa-ticket-alt"> {{__('lang.tickets')}}</i>
	        	</div>

	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>There are currently no tickets.</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
									<th>{{__('lang.category')}}</th>
		        					<th>{{__('lang.title')}}</th>
									<th>{{__('lang.status')}}</th>
									<th>{{__('lang.last updated')}}</th>
		        					<th style="text-align:center" colspan="2">{{__('lang.actions')}}</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
		        					<td>
		        					@foreach ($categories as $category)
		        						@if ($category->id === $ticket->category_id)
											{{ $category->name }}
		        						@endif
		        					@endforeach
		        					</td>
		        					<td>
		        						<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
		        							<p style="color:darkblue"><b>#{{ $ticket->ticket_id }} - {{ $ticket->title }}</b></p>
		        						</a>
		        					</td>
		        					<td>
		        					@if ($ticket->status === 'Open')
		        						<span class="badge badge-success" style="font-size:90%">{{ $ticket->status }}</span>
		        					@else
		        						<span class="badge badge-danger" style="font-size:90%">{{ $ticket->status }}</span>
		        					@endif
		        					</td>
		        					<td>{{ $ticket->updated_at }}</td>
		        					<td>
									<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-outline-primary waves-effect btn-sm">{{__('lang.comment')}}</a>
		        					</td>
		        					<td>
		        						<form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											@if ($ticket->status === 'Open')
										<button type="submit" id="close" class="btn btn-outline-danger waves-effect btn-sm">{{__('lang.close')}}</button>
											@else
												{{-- <button type="submit" id="close" class="btn btn-outline-danger waves-effect btn-sm" disabled>{{__('lang.close')}}</button> --}}
											@endif
		        						</form>
		        					</td>
		        				</tr>
		        			@endforeach
		        			</tbody>
		        		</table>

		        		{{ $tickets->render() }}
		        	@endif
	        	</div>
	        </div>
	    </div>
	</div>
</div>
@endsection