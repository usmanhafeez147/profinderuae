<!DOCTYPE HTML>
<html>
	<head>
		<title>Profinder Dubai</title>
		@push('metas')
			@foreach($fields as $field)
			  <meta title="{{ $field->title }}" keywords="{{ $field->key }}" description="{{ $field->description }}" value="{{ $field->value }}" image="{{ $field->image }}" image_title="{{ $field->img_title}}" image_alt="{{ $field->img_alt }}">
			@endforeach()
		@endpush()
		@include('company.layouts.header_scripts')
	</head>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				@include('company.layouts.header')
				@yield('content')
				@include('company.layouts.footer')
				
			</div>
		</div>
	</body>
	@include('company.layouts.footer_scripts')
</html>