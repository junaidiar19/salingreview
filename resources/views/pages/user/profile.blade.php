<x-user-layout>
    @include('partials.dropify')

    <h3 class="mb-3">Profile</h3>

    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <h5 class="card-title">Profile Picture</h5>
                <p class="text-muted">Edit your photo profile.</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <input type="file" class="dropify" data-min-width="200" data-default-file="{{ asset('assets/home/images/testimonials/01.jpg') }}">
                <div>
                    <h6>Your Photo</h6>
                    <p class="text-muted">
                        Allowed *.jpeg, *.jpg, *.png, *.gif max size of 4 MB
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <h5 class="card-title">Account Information</h5>
                <p class="text-muted">Edit your personal information.</p>
            </div>
            <div class="mb-3">
                <x-form.input-label :required="true">Full Name</x-form.input-label>
                <x-form.input type="text" name="name" />
                <x-form.input-error name="name" />
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-form.input-label :required="true">Phone</x-form.input-label>
                    <x-form.input type="text" name="phone" />
                    <x-form.input-error name="phone" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input-label :required="true">Birthday</x-form.input-label>
                    <x-form.input type="date" name="birthday" />
                    <x-form.input-error name="birthday" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-form.input-label :required="true">Email</x-form.input-label>
                    <x-form.input type="email" name="email" />
                    <x-form.input-error name="email" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-form.input-label :required="true">Passowrd</x-form.input-label>
                    <x-form.input type="password" name="password" />
                    <x-form.input-error name="password" />
                </div>
            </div>
        </div>
    </div>
    <div class="d-grid mt-4">
        <x-button.submit>Save</x-button.submit>
    </div>
</x-user-layout>