@extends('layouts.app')

@section('content')
	<h1> {{ $object->name}}  - OBJECT_{{$object->object_id}}</h1>
		@if ($object->availability == 0)
			<p> Status: Tidak dipamerkan </p>
		@else
			<p> Status: Dipamerkan</p>
		@endif
	<p>
		Durasi: {{$object->duration}}
	</p>
		<p>
		Marker: {{$object->marker_name}}
	</p>
	@for ($i = 0; $i < count($categories); $i++)
		<p>
			{{$categories[$i]->category}} : {{$values[$i]->values}}
		</p>
	@endfor
	Deskripsi default 
	<br>
	{{$description[0]->content}}
	</p>

	<div class="btn btn-primary">
		<a style="color: #fff" href="{{ action('ObjectsController@edit', [$object->id])}}">
			Ubah data utama objek
		</a>
	</div>
	{!! Form::open(['method' => 'DELETE', 'action' => ['ObjectsController@destroy', $object->id], 'style' => 'display: inline-block', 'onsubmit' => 'return confirm("Apakah kamu yakin ingin menghapus objek ini?");']) !!}
			<div >
				{!! Form::submit('Hapus seluruh objek', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
		
		
	<br><br>
	
	@if(count($photo) > 0)
		<p>Foto default: {{$photo[0]->photo_name}}</p>
		<div class="btn btn-primary">
				<a style="color: #fff" href="{{ action('PhotosController@edit', [$photo[0]->id])}}">
					Ubah foto
				</a>
			</div>
			{!! Form::open(['method' => 'DELETE', 'action' => ['PhotosController@destroy', $photo[0]->id], 'style' => 'display: inline-block', 'onsubmit' => 'return confirm("Apakah kamu yakin ingin menghapus foto ini?");']) !!}
				<div >
					{!! Form::submit('Hapus Foto', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
	@else
		<p>Belum ada foto default yang diunggah</p>
		<div class="btn btn-primary">
			<a style="color: #fff" href="{{ action('PhotosController@create', [$object->id])}}">
				Tambahkan Foto
			</a>
		</div>
	@endif
	<br><br>
	@if(count($video) > 0)
		<p>Video default: {{$video[0]->video_name}}</p>
		<div class="btn btn-primary">
				<a style="color: #fff" href="{{ action('VideosController@edit', [$video[0]->id])}}">
					Ubah video
				</a>
			</div>
			{!! Form::open(['method' => 'DELETE', 'action' => ['VideosController@destroy', $video[0]->id], 'style' => 'display: inline-block', 'onsubmit' =>'return confirm("Apakah kamu yakin ingin menghapus video ini?");']) !!}
				<div >
					{!! Form::submit('Hapus video', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
	@else
		<p>Belum ada video default yang diunggah</p>
		<div class="btn btn-primary">
			<a style="color: #fff" href="{{ action('VideosController@create', [$object->id])}}">
				Tambahkan Video
			</a>
		</div>
	@endif
	<hr>

	<div class="row">
		<div class="col-md-4" style="border-right: 1px solid #eee;">
			@if (count($descriptions) > 0)
				@for($i=0; $i < count($descriptions) ; $i++)
					<h4> Deskripsi khusus kategori: {{$categories[$descriptions[$i]->category_id -1]->category}} </h4>
					<p>{{$descriptions[$i]->content}}</p>
					<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('DescriptionsController@edit', [$descriptions[$i]->id])}}">
						Ubah Deskripsi
					</a>
				</div>
				{!! Form::open(['method' => 'DELETE', 'action' => ['DescriptionsController@destroy', $descriptions[$i]->id], 'style' => 'display: inline-block', 'onsubmit' => 'return confirm("Apakah kamu yakin ingin menghapus deskripsi ini?");']) !!}
					<div >
						{!! Form::submit('Hapus deskripsi', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
				@endfor
				<br><br>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('DescriptionsController@create', [$object->id])}}">
						Tambahkan Deskripsi
					</a>
				</div>
			@else
				<h3>Belum ada deskripsi khusus</h3>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('DescriptionsController@create', [$object->id])}}">
						Tambahkan Deskripsi
					</a>
				</div>
			@endif
		</div>
		<div class="col-md-4" style="border-left: 1px solid #eee; border-right: 1px solid #eee;">
				@if(count($photos) > 0)
				@for($i=0; $i < count($photos) ; $i++)
					<h4> Foto khusus kategori: {{$categories[$photos[$i]->category_id -1]->category}} </h4>
					<p>Foto: {{$photos[$i]->photo_name}}</p>
					<div class="btn btn-primary">
						<a style="color: #fff" href="{{ action('PhotosController@edit', [$photos[$i]->id])}}">
							Ubah foto
						</a>
					</div>
					{!! Form::open(['method' => 'DELETE', 'action' => ['PhotosController@destroy', $photos[$i]->id], 'style' => 'display: inline-block', 'onsubmit' => 'return confirm("Apakah kamu yakin ingin menghapus foto ini?");']) !!}
						<div >
							{!! Form::submit('Hapus Foto', ['class' => 'btn btn-primary']) !!}
						</div>
					{!! Form::close() !!}
					
				@endfor
				<br><br>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('PhotosController@create', [$object->id])}}">
						Tambahkan foto
					</a>
				</div>
			@else
				<h3>Belum ada foto khusus</h3>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('PhotosController@create', [$object->id])}}">
						Tambahkan foto
					</a>
				</div>
			@endif
		</div>
		<div class="col-md-4" style="border-left: 1px solid #eee;">
			@if(count($videos) > 0)
				@for($i=0; $i < count($videos); $i++)
					<h4> Video khusus kategori: {{$categories[$videos[$i]->category_id-1]->category}} </h4>
					<p>Video: {{$videos[$i]->video_name}}</p>
					<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('VideosController@edit', [$videos[$i]->id])}}">
						Ubah video
					</a>
				</div>
				{!! Form::open(['method' => 'DELETE', 'action' => ['VideosController@destroy', $videos[$i]->id], 'style' => 'display: inline-block', 'onsubmit' => 'return confirm("Apakah kamu yakin ingin menghapus video ini?");']) !!}
					<div >
						{!! Form::submit('Hapus Video', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!} 
				@endfor
				<br><br>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('VideosController@create', [$object->id])}}">
						Tambahkan video
					</a>
				</div>
			@else
				<h3>Belum ada video khusus</h3>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('VideosController@create', [$object->id])}}">
						Tambahkan video
					</a>
				</div>
			@endif
		</div>
	</div>
	<hr>
@stop