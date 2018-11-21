@extends('layouts.app')

@section('content')
	<h1>Edit Map:</h1>

	{!! Form::model($path, ['method' => 'PATCH', 'action' => ['PathsController@update', $path->id]]) !!}

		<div class="form-group">
			{!! Form::label('path_id', 'Path ID:') !!}
			{!! Form::text('path_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('steps', 'Step:') !!}
			{!! Form::textarea('steps', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Ubah Path', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@include('errors.list')

@stop