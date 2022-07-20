<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@include('profile.include.meta')
	@yield('csscustom')
</head>
<body id="bop">
	@include('profile.include.header')
	@yield('content')
	@include('profile.include.footer')

	@include('profile.include.custom-script')
	@yield('jscustom')
</body>
</html>
