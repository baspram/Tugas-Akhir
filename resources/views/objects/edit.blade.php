@extends('layouts.app')

@section('content')
	<h1>Edit: {{$object->name}}</h1>
	@include('errors.list')
	{!! Form::model($object, ['method' => 'PATCH', 'files' => true, 'action' => ['ObjectsController@update', $object->id], 'class' => 'category-form']) !!}
		<div class="form-group">
			{!! Form::label('object_id', 'ID Objek: (angka sesaui pada file osm)') !!}
			{!! Form::input('number','object_id', null, ['class' => 'form-control', 'min' => '0']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('name', 'Nama:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('availability', 'Ketersediaan:') !!} <br>
			{!! Form::radio('availability', '1', true) !!} Dapat Diakses <br>
			{!! Form::radio('availability', '0') !!} Tidak Dapat Diakses
		</div>

		<div class="form-group">
			{!! Form::label('duration', 'Durasi: (menit)') !!}
			{!! Form::text('duration', null, ['class' => 'form-control']) !!}
		</div>

		<input id="category_count" type="hidden" value={{$count}}>

		<?php $i = 0; ?>
		@foreach ($categories as $category)
			<?php $class = "category-added-" . $i ?>
			<div class="form-group">
				<label >Nilai kategori {{$category['category']}}</label>
				<input class="form-control category-control-value <?php echo $class; ?>" type="number" min="0" value="{{$values[$i]->values}}">
			</div>
			<?php $i++; ?>
		@endforeach

		<input name="category_list" type="hidden" id="category_list" value="">

		<div class="form-group">
			<label for="content">Deskripsi default: </label>
			<textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$descriptions[0]["content"]}}</textarea>
		</div>
		
		<div class="form-group">
			{!! Form::label('marker', 'Marker: ' ) !!}
			{!! Form::file('marker', null, ['class' => 'form-control']) !!}
			<div>
				File sebelumnya: {{$object["marker_name"]}} <br>
				Jika tidak ingin mengubah biarkan kosong
			</div>
		</div>
	
		<div class="form-group">
			{!! Form::submit('Ubah Objek', ['class' => 'btn btn-primary form-control category-submit']) !!}
		</div>
	{!! Form::close() !!}

	{!! Form::open(['method' => 'DELETE', 'action' => ['ObjectsController@destroy', $object->id]]) !!}
		<div class="form-group">
			{!! Form::submit('Hapus Objek', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	

@stop