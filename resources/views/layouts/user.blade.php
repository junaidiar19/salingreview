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

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('includes.user.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>

    @include('includes.home.footer')

    @include('includes.home.scripts')
    @stack('scripts')
</body>
</html>