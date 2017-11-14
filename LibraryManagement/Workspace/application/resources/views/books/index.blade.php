@extends('main')

@section('title', '| All books')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Books</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('books.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Book</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Authors</th>
          <th>Publisher</th>
					<th>Created At</th>
				</thead>

				<tbody>
					
					@foreach ($books as $book)
						
						<tr>
							<th>{{ $book->id }}</th>
							<td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
							<td>{{ $book->authors }}</td>
              <td>{{ $book->publisher }}</td>
							<td>{{ date('M j, Y', strtotime($book->created_at)) }}</td>
						</tr>

					@endforeach

				</tbody>
			</table>
		</div>
	</div>

@stop