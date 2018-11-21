@extends('main')

@section('content')

	<h1>show items:</h1>

	@if ($name == 'Bagaskara')
		<p>Hi Bagaskara</p>
	@else
		<p>Hi Else</p>
	@endif
	
	@if (count($objects))
		<h3>List of Object:</h3>
		<ul>
			@foreach ($objects as $object)
				<li>{{ $object }}</li>
			@endforeach
		</ul>

	@endif
	
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates at consectetur libero rem reiciendis nemo ex aspernatur recusandae sapiente repellendus nobis impedit ipsum obcaecati ab cumque, ipsa molestias! Cupiditate, quidem.</p>

@stop
