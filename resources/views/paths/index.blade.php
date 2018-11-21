@extends('layouts.app')

@section('content')
	<h1>Langkah</h1>
	<div class="btn btn-primary">
		<a href="{{action('PathsController@create')}}" style="color: #fff">
			Tambahkan Langkah	
		</a>
	</div>
	<hr>

	@if (count($paths))
		@foreach ($paths as $path)
			<article>
				<h3>
					
						Path ID: {{ $path->path_id }}
					
				</h3>
				<p>
					{{ $path->steps }}
				</p>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('PathsController@edit', [$path->id]) }}">
						Ubah Path
					</a>
				</div>
				{!! Form::open(['method' => 'DELETE', 'action' => ['PathsController@destroy', $path->id], 'style' => 'display: inline-block']) !!}
					<div >
						{!! Form::submit('Hapus Path', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
			</article>
		@endforeach
	@endif
@stop