@extends('layouts.app')

@section('content')
	
	<h1>Tambahkan Kateogri Objek</h1>
	<hr>
	
	{!! Form::open(['action' => 'CategoryController@store', 'class' => 'category-form']) !!}
		
		<div class="form-group">
			<label for="category_count">Jumlah Kategori </label>
			<input class="form-control" name="category_count" type="number" min="0" max="10" id="category_count" value="0">
		</div>

		<div class="category-list">
			
		</div>

		<input class="" name="category_list" type="hidden" id="category_list" value="">

		<div class="form-group">
			{!! Form::submit('Tetapkan Kategori', ['class' => 'btn btn-primary form-control category-submit']) !!}
		</div>
	{!! Form::close() !!}

	@include('errors.list')

@stop