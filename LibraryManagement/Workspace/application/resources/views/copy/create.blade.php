@extends('main')

@section('title', '| Add New Copy')

@section('content')

    <div class="row">
        <h1 style="text-align: center">Create New Copy of existing book</h1>
        {!! Form::model(null, ['route' => ['book.copy.store', $book_id], 'method' => 'POST']) !!}

        <div class="col-md-6">

            <h3>Copy Information</h3>

            {{ Form::label('book_id', 'Book ID* ') }}
            {{ Form::text('book_id', $book_id, array('class' => 'form-control', 'disabled' => '', 'maxlength' => '255')) }}

            {{ Form::label('number_of_copies', 'Number of Copies* ') }}
            {{ Form::text('number_of_copies', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '2')) }}

            {{ Form::label('type_of_copy', 'Type of copy* ') }}
            {{ Form::select('type_of_copy', ['referenced' => 'Referenced', 'borrowable' => 'Borrowable'], 'R', ['class' => 'form-control']) }}

            {{ Form::label('price', 'Price* ') }}
            {{ Form::text('price', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '6')) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::submit('Create copies', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
                </div>
                <div class="col-md-6">
                    {!! Html::linkRoute('book.show', 'Cancel', array($book_id), array('class' => 'btn btn-danger btn-lg btn-block', 'style' => 'margin-top: 20px;')) !!}
                </div>
            </div>

        </div>
        {!! Form::close() !!}

    </div>

@endsection