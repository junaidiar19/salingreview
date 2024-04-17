<div class="mb-3">
    <x-form.input-label :required="true">Kode</x-form.input-label>
    <x-form.input type="text" name="code" :value="old('code', @$product->code)" placeholder="Kode produk" />
    <x-form.input-error name="code" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Nama</x-form.input-label>
    <x-form.input type="text" name="name" :value="old('name', @$product->name)" placeholder="Nama produk" />
    <x-form.input-error name="name" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Harga</x-form.input-label>
    <x-form.input type="text" name="price" :value="old('price', @$product->price)" placeholder="Rp. 0" />
    <x-form.input-error name="price" />
</div>

<div class="mb-4">
    <x-form.input-label :required="true">Deskripsi</x-form.input-label>
    <x-form.textarea name="description"
        placeholder="Deskripsi produk">{{ old('description', @$product->description) }}</x-form.textarea>
    <x-form.input-error name="description" />
</div>
