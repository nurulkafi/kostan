<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ $title ?? 'Kostan.id' }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    @include('landing_pages.layouts.style')
    <style>
        
    </style>
</head>
<body class="animsition">
    @include('sweetalert::alert')
    @include('landing_pages.layouts.header')
    @yield('content')
    @include('landing_pages.layouts.footer')
    @include('landing_pages.layouts.script')
</body>
</html>
