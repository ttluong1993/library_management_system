@extends('main')

@section('title', '| Add New Book')

@section('content')

	<div class="row">
		<h1 style="text-align: center">Create New Book</h1>  
		<div class="col-md-6">

      {!! Form::open(array('route' => 'books.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title* ') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{ Form::label('publisher', 'Publisher* ') }}
				{{ Form::text('publisher', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{ Form::label('authors', 'Authors* ') }}
				{{ Form::text('authors', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{ Form::label('isbn', 'ISBN* ') }}
				{{ Form::text('isbn', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::submit('Create Book', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
					</div>
					<div class="col-md-6">
						{!! Html::linkRoute('books.index', 'Cancel', null, array('class' => 'btn btn-danger btn-lg btn-block', 'style' => 'margin-top: 20px;')) !!}						
					</div>
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>

@endsection