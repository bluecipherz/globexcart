@extends('layouts.core')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2">
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</span>
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<ul class="list-group">
				@foreach($pages as $page => $pageDetails)
				<li class="list-group-item"><a href="{{ $pageDetails['link'] }}">{{ $page }}</a></li>
				@endforeach
			</ul>
		</div>
		@if($message)
			hello
			<div class="alert alert-danger">{{ $message }}<span class="close"></span></div>
		@endif
		@include('admin/partials/' . $currentPage)
	</div>
</div>

@stop