<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.home.meta')

	<title>{{ config('app.name') }}</title>

    @include('includes.home.styles')
    @stack('styles')
</head>
<body>
    
    @include('includes.home.navbar')

    {{ $slot }}

    @include('includes.home.footer')

    @include('includes.home.scripts')
</body>
</html>