@extends('layouts.app')

@section('content')
	<div class="wrapper">
		<video id="video" preload="auto" playsinline controls>
			<source id="source">
			Your browser does not support the video tag.
		</video>
	</div>
@endsection


@push('assets')
	@vite(['resources/js/pages/videos.js'])
@endpush
