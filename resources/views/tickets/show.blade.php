@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<p class="badge badge-default" style="font-size:100%">#{{ $ticket->ticket_id }} - {{ $ticket->title }}</p>
	        	</div>

	        	<div class="panel-body">
	        		@include('includes.flash')
	        		
	        		<div class="ticket-info">
	        			<h5>{{ $ticket->message }}</h5>
		        		<h5>{{__('lang.category')}}: {{ $category->name }}</h5>
		        		<h5>
	        			@if ($ticket->status === 'Open')
							{{__('lang.status')}}: <span class="badge badge-success" style="font-size:90%">{{ $ticket->status }}</span>
    					@else
							{{__('lang.status')}}: <span class="badge badge-danger" style="font-size:90%">{{ $ticket->status }}</span>
    					@endif
						</h5>
		        		<p><b>Created on: {{ $ticket->created_at->diffForHumans() }}</b></p>
	        		</div>

	        		<hr>

	        		<div class="comments">
	        			@foreach ($comments as $comment)
	        				<div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
	        					<div class="panel panel-heading">
	        						<b>{{ $comment->user->name }}</b>
	        						<span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
	        					</div>

	        					<div class="panel panel-body">
	        						<b>{{ $comment->comment }}</b>		
	        					</div>
							</div>
							<hr>
	        			@endforeach
	        		</div>
					
	        		<div class="comment-form">
		        		<form action="{{ url('comment') }}" method="POST" class="form">
							@csrf

		        			<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

		        			<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
	                        </div>

	                        <div class="form-group">
							<button type="submit" class="btn btn-primary">{{__('lang.submit')}}</button>
	                        </div>
		        		</form>
	        	</div>
	        </div>
	    </div>
	</div>
</div>
@endsection