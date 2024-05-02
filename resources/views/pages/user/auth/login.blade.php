<x-auth-layout>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 col-lg-6">
            <div class="text-center mb-5">
                <img src="{{ asset('assets/home/images/logo.png') }}" class="h-10 mb-4" alt="">
                <h3 class="mb-0">Welcome Back</h3>
                <p class="text-muted">
                    Don’t have an account yet? <a href="{{ route('register') }}">Register here</a>
                </p>
            </div>
            <div class="card border-0 shadow-md">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <x-form.input-label :required="true">Email</x-form.input-label>
                            <x-form.input type="email" name="email" :value="old('email')" required />
                            <x-form.input-error name="email" />
                        </div>
                        <div class="mb-3">
                            <x-form.input-label :required="true">Password</x-form.input-label>
                            <x-form.input type="password" name="password" required />
                            <x-form.input-error name="password" />
                        </div>
                        <div class="d-grid">
                            <x-button.submit>
                                Sign In
                            </x-button.submit>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>