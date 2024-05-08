@extends('layouts.app')

@section('content')
	<div class="wrapper">
		<div class="presentation"></div>
	</div>
@endsection


@push('assets')
	@vite($entries)
@endpush

