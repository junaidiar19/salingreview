<!-- Libs CSS -->
<link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-5/css/all.min.css') }}">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

{{-- Vite --}}
@vite(['resources/css/admin.css', 'resources/js/plugins/notyf.js', 'resources/js/plugins/sweetalert2.js'])

{{-- Livewire --}}
@livewireStyles
