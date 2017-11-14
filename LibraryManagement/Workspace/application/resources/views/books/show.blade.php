@extends('main')

@section('title', '| View Book')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>{{ $book->title }}</h1>
			
			<p class="lead">{{ $book->authors }}</p>
      <span>{{ $book->publisher }}</span>
		</div>

@endsection