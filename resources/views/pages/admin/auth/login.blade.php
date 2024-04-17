<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    @include('includes.admin.meta')

    <!-- Title -->
    <title>Login | {{ config('app.name') }}</title>

    <!-- Styles -->
    @include('includes.admin.styles')
</head>

<body class="bg-light">
    <!-- container -->
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <div class="card smooth-shadow-md">
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="/">
                                <img src="{{ asset('assets/images/brand/logo/logo-primary.svg') }}" class="mb-2"
                                    alt="">
                            </a>
                            <p class="mb-5">Please enter your user information.</p>
                        </div>

                        <x-form :action="route('admin.authenticate')">
                            <div class="mb-3">
                                <x-form.input-label :required="true">Email</x-form.input-label>
                                <x-form.input type="email" name="email" :value="old('email')"
                                    placeholder="Email address here" />
                                <x-form.input-error name="email" />
                            </div>
                            <div class="mb-3">
                                <x-form.input-label :required="true">Password</x-form.input-label>
                                <x-form.input-password />
                            </div>
                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                    <label class="form-check-label" for="rememberme">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="d-grid">
                                    <x-button.submit class="btn-primary shadow">
                                        Login
                                    </x-button.submit>
                                </div>
                                <div class="d-md-flex justify-content-center mt-4">
                                    <div>
                                        <a href="#!" class="text-inherit fs-5">
                                            Forgot your password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </x-form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @include('includes.admin.scripts')
</body>

</html>
