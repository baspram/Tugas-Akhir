@extends('layouts.app')

@section('content')
	
	<h1>Tambah Foto</h1>
	@include('errors.list')
	<hr>
	
	{!! Form::open(['action' => 'PhotosController@store', 'files' => true, 'class' => 'category-form']) !!}
		
		<div class="form-group">
			<label for="">Pilih jenis kategori</label>
			<select class="form-control" name="category_id" id="category_id">
				<option value="" selected> Default </option>
				@foreach($categories as $category)
				<option value="{{$category->id}}"> {{$category->category}} </option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('file', 'File:') !!}
			{!! Form::file('file', null, ['class' => 'form-control']) !!}
		</div>
		<input type="hidden" name="object_id" id="object_id" value="{{$object_id}}">
		<div class="form-group">
			{!! Form::submit('Tambahkan Foto', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

@stop