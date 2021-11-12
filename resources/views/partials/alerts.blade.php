@if (session('status'))

	<x-flash>
		{!! session('status') !!}
	</x-flash>

@elseif ($errors->any())

	<x-flash type="error">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</x-flash>
	
@endif