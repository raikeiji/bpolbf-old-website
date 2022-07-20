<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@include('covid.include.meta')
	@yield('csscustom')
</head>
<body id="bg">
	<div class="page-wraper">
		@include('covid.include.header')
		@yield('content')
		@include('covid.include.footer')
		<button class="scroltop style1 radius" type="button"><i class="fa fa-arrow-up"></i></button>
		</div>
		@include('covid.include.custom-script')
		@yield('jscustom')
	</body>
</html>

