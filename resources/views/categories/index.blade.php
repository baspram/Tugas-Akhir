@extends('layouts.app')

@section('content')
	<h1>Jumlah Kategori: {{ $count}} </h1>
	<div class="btn btn-primary">
		<a href="{{action('ObjectsController@create')}}" style="color: #fff">
			Tambahkan Objek	
		</a>
	</div>
	@foreach ($categories as $category)
			<article>
				<h3>
					{{ $category }}
				</h3>
			</article>
	@endforeach
@stop