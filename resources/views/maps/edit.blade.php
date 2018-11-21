@extends('layouts.app')

@section('content')
	<h1>Edit Peta:</h1>

	{!! Form::model($map, ['method' => 'PATCH', 'files' => true, 'action' => ['MapsController@update', $map->id]]) !!}

		<div class="form-group">
			{!! Form::label('tilesFile', 'Tile File:') !!}
			{!! Form::file('tilesFile', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('osmFile', 'OSM File:') !!}
			{!! Form::file('osmFile', null, ['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::submit('Ubah Peta', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@include('errors.list')

@stop