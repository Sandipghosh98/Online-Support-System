@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
	<div class="row">
		<div class="container">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fas fa-ticket-alt"> {{__('lang.tickets')}}</i>
				</div>
				
	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>You have not created any tickets.</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
		        					<th>{{__('lang.category')}}</th>
		        					<th>{{__('lang.title')}}</th>
		        					<th>{{__('lang.status')}}</th>
		        					<th>{{__('lang.last updated')}}</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
		        					<td>
		        					@foreach ($categories as $category)
		        						@if ($category->id === $ticket->category_id)
											<b>{{ $category->name }}</b>
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