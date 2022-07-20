<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@include('tourism.include.meta')
	@yield('csscustom')
</head>
<body id="bg">
	@include('tourism.include.header_pages')
	@yield('content')
	@include('tourism.include.footer')
	@include('tourism.include.custom-script')
	@yield('jscustom')
</body>
</html>

