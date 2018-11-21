@extends('layouts.app')

@section('content')
	<h1>Objek</h1>
	<div class="btn btn-primary">
		<a href="{{action('ObjectsController@create')}}" style="color: #fff">
			Tambahkan Objek	
		</a>
	</div>
	<hr>
	@if(Session::has('alert-success'))
      <p class="alert alert-success">{{ Session::get('alert-success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
	@if (count($objects))
		@foreach ($objects as $object)
			<article>
				<h3>
						<a  href="{{ action('ObjectsController@show', [$object->id])}}">
							{{$object->object_id}}. {{ $object-> name }}
						</a>										
				</h3>
				<!-- <div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('ObjectsController@edit', [$object->id])}}">
						Ubah Objek
					</a>
				</div>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('DescriptionsController@create', [$object->id])}}">
						Tambahkan Deskripsi
					</a>
				</div>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('PhotosController@create', [$object->id])}}">
						Tambahkan Foto
					</a>
				</div>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('VideosController@create', [$object->id])}}">
						Tambahkan Video
					</a>
				</div>
				{!! Form::open(['method' => 'DELETE', 'action' => ['ObjectsController@destroy', $object->id], 'style' => 'display: inline-block']) !!}
					<div >
						{!! Form::submit('Hapus Objek', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
 -->
			</article>
		@endforeach
	@endif
@stop