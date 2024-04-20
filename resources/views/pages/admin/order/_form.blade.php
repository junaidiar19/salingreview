@include('partials.dropify')
@include('partials.select2')

<x-error-list />

<div class="row">
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">User (Pelanggan)</x-form.input-label>
        <x-form.select name="user_id" id="select-users" required>
            <option value="">Pilih User</option>
            {{-- @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', @$order->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach --}}
        </x-form.select>
        <x-form.input-error name="user_id" />
    </div>
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Tanggal Pesan</x-form.input-label>
        <x-form.input type="date" name="order_date" :value="old('order_date', @$order->order_date) ?? \Carbon\Carbon::now()->format('Y-m-d')" />
        <x-form.input-error name="order_date" />
    </div>
</div>


<h5>Rincian Pembelian</h5>
<div class="bg-light p-3 rounded-2 mb-3">
    <div class="row">
        <div class="col-md-4">
            <x-form.input-label :required="true">Produk</x-form.input-label>
            <x-form.select id="product_id" name="product_id" class="select2-input" required>
                <option value="">Pilih Produk</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ old('product_id', @$order->detail->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.input-error name="product_id" />
        </div>
        <div class="col-md-4">
            <x-form.input-label :required="true">Harga Produk</x-form.input-label>
            <x-form.input type="number" id="price" name="price" :value="old('price', @$order->detail->price)" placeholder="Harga Produk"
                readonly />
        </div>
        <div class="col-md-4">
            <x-form.input-label :required="true">Jumlah Pesanan</x-form.input-label>
            <x-form.input type="number" id="quantity" name="quantity" :value="old('quantity', @$order->detail->quantity)" min="1"
                placeholder="Jumlah Pesanan" />
        </div>
    </div>
</div>

<h5>Form Diskon</h5>
<div class="bg-light p-3 rounded-2 mb-3">
    <div class="row">
        <div class="col-md-6">
            <x-form.input-label>Nama Diskon</x-form.input-label>
            <x-form.input type="text" name="discount_name" :value="old('discount_name')" placeholder="Nama Diskon" />
        </div>
        <div class="col-md-6">
            <x-form.input-label>Nominal Diskon</x-form.input-label>
            <x-form.input type="text" id="discount_value" name="discount_value" :value="old('discount_value')"
                placeholder="Rp. 0" />
        </div>
    </div>
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Total Harga</x-form.input-label>
    <x-form.input type="number" id="total" name="total" :value="old('total', @$order->total)" placeholder="Total Harga" readonly />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Bukti Transfer</x-form.input-label>
    <input type="file" name="proof" class="dropify" data-default-file="{{ old('proof', @$order->proof_url) }}" />
    <x-form.input-error name="proof" />
</div>

<div class="mb-3">
    <x-form.input-label>Catatan</x-form.input-label>
    <x-form.textarea name="notes" placeholder="Catatan Order">{{ old('notes', @$order->notes) }}</x-form.textarea>
    <x-form.input-error name="notes" />
</div>

<input type="hidden" name="status" value="success">

<x-scripts.select2-ssr id="select-users" :url="route('admin.users.get-data.select')" />
@push('scripts')
    <script>
        // get data product if product_id is selected
        $('#product_id').on('change', function() {
            let product_id = $(this).val();
            if (product_id != '') {
                $.ajax({
                    url: "{{ route('admin.products.get-data') }}",
                    type: "GET",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        $('#price').val(response.price);
                    }
                });
            } else {
                $('#price').val('');
            }
        });

        // calculate total price by price and quantity
        $('#quantity').on('keyup', function() {
            let price = $('#price').val();
            let quantity = $(this).val();
            let discount_value = $("#discount_value").val();

            let total_price = price * quantity;
            let total = total_price - discount_value;
            $('#total').val(total);
        });

        // calculate total price by total - discount_value
        $('#discount_value').on('keyup', function() {
            let quantity = $("#quantity").val();
            let price = $('#price').val();
            let discount_value = $(this).val();

            let total = quantity * price;
            let total_price = total - discount_value;
            $('#total').val(total_price);
        });
    </script>
@endpush
