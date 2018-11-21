@extends('layouts.app')

@section('content')
	
	<h1>Ubah Video</h1>
	@include('errors.list')
	<hr>
	
	{!! Form::model($video, ['method' => 'PATCH', 'action' => ['VideosController@update', $video->id], 'files' => true, 'class' => 'category-form']) !!}
		<div class="form-group">
			<label for="">Pilih jenis kategori</label>
			<select class="form-control" name="category_id" id="category_id">
				<!-- <option value="" selected> Default </option> -->
				@foreach($categories as $category)
					@if($category->id == $video->category_id)
						<option value="{{$category->id}}" selected> {{$category->category}} </option>
					@endif
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('file', 'File:') !!}
			{!! Form::file('file', null, ['class' => 'form-control']) !!}
			File sebelumnya: {{$video["video_name"]}} <br>
		</div>
		
		<div class="form-group">
			{!! Form::submit('Ubah Video', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}


@stop