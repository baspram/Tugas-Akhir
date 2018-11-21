@extends('layouts.app')

@section('content')
	
	<h1>Buat Deskripsi Spesifik</h1>
	
	@include('errors.list')
	<hr>
	
	{!! Form::open(['action' => 'DescriptionsController@store', 'class' => 'description-form']) !!}
		
		<div class="form-group">
			<label for="">Pilih jenis kategori</label>
			<select class="form-control" name="category_id" id="category_id">
				<option value="" selected> Default </option>
				@foreach($categories as $category)
				<option value="{{$category->id}}"> {{$category->category}} </option>
				@endforeach
			</select>
		</div>

		<input type="hidden" name="object_id" id="object_id" value="{{$object_id}}">
		
		<div class="form-group">
			<label for="content">Deskripsi spesifik: </label>
			<textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
		</div>

		<div class="form-group">
			{!! Form::submit('Tambahkan Deskripsi', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}


@stop
