<div class="mb-3">
    <x-form.input-label :required="true">Nama</x-form.input-label>
    <x-form.input type="text" name="name" :value="old('name', @$user->name)" placeholder="Nama Pengguna" autocomplete="off" />
    <x-form.input-error name="name" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Email</x-form.input-label>
    <x-form.input type="email" name="email" :value="old('name', @$user->email)" placeholder="Email pengguna" autocomplete="off" />
    <x-form.input-error name="email" />
</div>

<div class="mb-3">
    <x-form.input-label :required="@$user ? false : true">Password</x-form.input-label>
    <x-form.input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" />
    <x-form.input-error name="password" />
</div>