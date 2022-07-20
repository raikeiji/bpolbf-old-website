<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@include('investasi.include.meta')
	@yield('csscustom')
</head>
<body id="invest">
	@include('investasi.include.header_pages')
	@yield('content')
	@include('investasi.include.footer')
	@include('investasi.include.custom-script')
	@yield('jscustom')
</body>
</html>

