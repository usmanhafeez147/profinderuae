<!DOCTYPE HTML>
<html>
	<head>
		<title>Profinder UAE</title>
		@push('metas')
			@foreach($fields as $field)
			  <meta title="{{ $field->title }}" keywords="{{ $field->key }}" description="{{ $field->description }}" value="{{ $field->value }}" image="{{ $field->image }}" image_title="{{ $field->img_title}}" image_alt="{{ $field->img_alt }}">
			@endforeach()
		@endpush()
		@include('layouts.header_scripts')
	</head>
	<body class="" onload="initialize()">
		<div id="main-wrapper" class="our-agents-content">
			@include('layouts.header')
			@yield('content')
			@include('layouts.footer')
			@include('layouts.footer_scripts')
		</div>
	</body>
</html>