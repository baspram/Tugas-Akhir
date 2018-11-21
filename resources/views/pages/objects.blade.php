@extends('main')

@section('content')
	<h1>Objects</h1>
	<hr>

	@if (count($objects))
		@foreach ($objects as $object)
			<article>
				<h2>{{ $object-> name }}</h2>
				<p> {{ $object->availability}} </p>
				<p> {{ $object->description}} </p>
			</article>
		@endforeach
	@endif
@stop