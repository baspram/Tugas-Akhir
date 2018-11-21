@extends('layouts.app')

@section('content')

	<h1>Buat Peta Baru</h1>
	<hr>
	
	{!! Form::open(['action' => 'MapsController@store', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('tilesFile', 'Tile File:') !!}
			{!! Form::file('tilesFile', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('osmFile', 'OSM File: ') !!}
			{!! Form::file('osmFile', null, ['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::submit('Tambahkan Map', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@include('errors.list')

@stop