@extends('layouts.app')

@section('content')

	<h1>Buat Path Baru</h1>
	<hr>
	
	{!! Form::open(['action' => 'PathsController@store']) !!}

		<div class="form-group">
			{!! Form::label('path_id', 'Path ID:') !!}
			{!! Form::text('path_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('steps', 'Step:') !!}
			{!! Form::textarea('steps', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Tambahkan Path', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@include('errors.list')

@stop