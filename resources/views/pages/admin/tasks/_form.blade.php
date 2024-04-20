<x-error-list />

<div class="mb-3">
    <x-form.input-label :required="true">Order (ID Transaksi)</x-form.input-label>
    @if (@$_GET['order_code'] || @$task)
        <x-form.input type="text" name="order_code" :value="old('order_code', @$_GET['order_code'] ?? @$task->order->code)" placeholder="Order (ID Transaksi)" readonly
            required />
    @else
        <x-form.select name="order_code" id="select-orders" required></x-form.select>
        <x-form.input-error name="order_code" />
    @endif
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Judul</x-form.input-label>
    <x-form.input type="text" name="name" :value="old('name', @$task->name)" placeholder="Judul tugas" />
    <x-form.input-error name="name" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Tanggal Mulai</x-form.input-label>
    <x-form.input type="date" name="start_date" :value="old('start_date', @$task->start_date)" />
    <x-form.input-error name="start_date" />
</div>

<div class="row mb-3">
    <div class="col-lg-6">
        <x-form.input-label :required="true">User (Pelanggan)</x-form.input-label>
        <x-form.select name="user_id" id="select-users" required>
            @if (@$user)
                <option value="{{ $user->id }}" selected>[{{ $user->email }}] {{ $user->name }}</option>
            @endif
        </x-form.select>
        <x-form.input-error name="user_id" />
    </div>
    <div class="col-lg-6">
        <x-form.input-label :required="true">Produk</x-form.input-label>
        <x-form.select id="product_id" name="product_id" class="select2-input" required>
            <option value="">Pilih Produk</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}"
                    {{ old('product_id', @$task->product_id) == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input-error name="product_id" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-6">
        <x-form.input-label :required="true">Kuota</x-form.input-label>
        <x-form.input type="number" name="quota" :value="old('quota', @$task->quota)" placeholder="0" />
        <x-form.input-error name="quota" />
    </div>
    <div class="col-lg-6">
        <x-form.input-label :required="true">Kuota Harian</x-form.input-label>
        <x-form.input type="number" name="daily_quota" :value="old('daily_quota', @$task->daily_quota)" placeholder="0" />
        <x-form.input-error name="daily_quota" />
    </div>
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Komisi</x-form.input-label>
    <x-form.input type="number" name="commission" :value="old('commission', @$task->commission)" placeholder="0" />
    <x-form.input-error name="commission" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Instruksi</x-form.input-label>
    <x-form.textarea name="instructions" id="editor"
        placeholder="Instruksi...">{{ old('instructions', @$task->instructions) }}</x-form.textarea>
    <x-form.input-error name="instructions" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Kriteria</x-form.input-label>
    <x-form.textarea name="criteria" id="editor2"
        placeholder="Kriteria...">{{ old('criteria', @$task->criteria) }}</x-form.textarea>
    <x-form.input-error name="criteria" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Link Tugas</x-form.input-label>
    <x-form.input type="text" name="task_link" :value="old('task_link', @$task->task_link)" placeholder="https://.." />
    <x-form.input-error name="task_link" />
</div>

<div class="mb-3">
    <x-form.input-label>Status</x-form.input-label>
    <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" name="is_published" role="switch" id="task-status"
            value="1" {{ @$task->is_published ? 'checked' : '' }}>
        <label class="form-check-label" for="task-status">Publish</label>
    </div>
</div>

<x-scripts.select2-ssr id="select-users" :url="route('admin.users.get-data.select')" />
@if (!@$_GET['order_code'])
    <x-scripts.select2-ssr id="select-orders" :url="route('admin.orders.get-data.select')" />
@endif

<div class="d-grid">
    <x-button.submit>
        Simpan
    </x-button.submit>
</div>

<x-scripts.ckeditor id="editor" />
<x-scripts.ckeditor id="editor2" />
@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush
