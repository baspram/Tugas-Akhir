@extends('layouts.app')

@section('content')
	
	<h1>Buat Deskripsi Spesifik</h1>

	@include('errors.list')
	<hr>
	
	{!! Form::model($description, ['method' => 'PATCH', 'action' => ['DescriptionsController@update', $description->id], 'class' => 'description-form']) !!}
		
		<div class="form-group">
			<label for="">Pilih jenis kategori</label>
			<select class="form-control" name="category_id" id="category_id">
				<!-- <option value="" selected> Default </option> -->
				@foreach($categories as $category)
					@if($category->id == $description->category_id)
						<option value="{{$category->id}}" selected> {{$category->category}} </option>
					@endif
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="content">Deskripsi spesifik: </label>
			<textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$description['content']}}</textarea>
		</div>
		
		<input type="hidden" name="object_id" id="object_id" value="{{$object_id}}">

		<div class="form-group">
			{!! Form::submit('Ubah Deskripsi', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

@stop
