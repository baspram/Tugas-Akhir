@extends('layouts.app')

@section('content')
	<h1>Map</h1>
	<hr>
	@if(Session::has('alert-success'))
      <p class="alert alert-success">{{ Session::get('alert-success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
	@if (count($maps))
		@foreach ($maps as $map)
			<article>
				<h3>
					
						Map tiles: {{ $map->tilesFileName }}
						<br>
						Osm File: {{ $map->osmFileName }}
					
				</h3>
				<p>
					{{ $map->updated_at }}
				</p>
				<div class="btn btn-primary">
					<a style="color: #fff" href="{{ action('MapsController@edit', [$map->id]) }}">
						Perbarui Peta
					</a>
				</div>
			</article>
		@endforeach
	@endif
@stop