<x-auth-layout>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 col-lg-6">
            <div class="text-center mb-5">
                <img src="{{ asset('assets/home/images/logo.png') }}" class="h-10 mb-4" alt="">
                <h3 class="mb-0">Create Account</h3>
                <p class="text-muted">
                    Sign up now and get free account instant.
                </p>
            </div>
            <div class="card border-0 shadow-md">
                <div class="card-body">
                    <form action="">
                        @csrf

                        <div class="mb-3">
                            <x-form.input-label :required="true">Full Name</x-form.input-label>
                            <x-form.input type="text" name="name" required />
                            <x-form.input-error name="name" />
                        </div>
                        <div class="mb-3">
                            <x-form.input-label :required="true">Email</x-form.input-label>
                            <x-form.input type="email" name="email" required />
                            <x-form.input-error name="email" />
                        </div>
                        <div class="mb-3">
                            <x-form.input-label :required="true">Password</x-form.input-label>
                            <x-form.input type="password" name="password" required />
                            <x-form.input-error name="password" />
                        </div>
                        <div class="mb-3">
                            <x-form.input-label :required="true">Confirm Password</x-form.input-label>
                            <x-form.input type="password" name="confirm" required />
                            <x-form.input-error name="confirm" />
                        </div>
                        <div class="d-grid">
                            <x-button.submit>
                                Sign Up
                            </x-button.submit>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>