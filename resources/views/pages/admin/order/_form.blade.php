@include('partials.dropify')
@include('partials.select2')

<div class="row">
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">User (Pelanggan)</x-form.input-label>
        <x-form.select name="user_id" class="select2-input" required>
            <option value="">Pilih User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', @$order->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input-error name="user_id" />
    </div>
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Tanggal Pesan (Default Hari Ini)</x-form.input-label>
        <x-form.input type="date" name="order_date" :value="old('order_date', @$order->order_date) ?? \Carbon\Carbon::now()->format('Y-m-d') "/>
        <x-form.input-error name="order_date" />
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Produk</x-form.input-label>
        <x-form.select id="product_id" name="product_id" class="select2-input" required>
            <option value="">Pilih Produk</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id', @$order->detail->product_id) == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input-error name="product_id" />
    </div>
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Harga Produk</x-form.input-label>
        <x-form.input type="number" id="price" name="price" :value="old('price', @$order->detail->price)" placeholder="Harga Produk" readonly />
        <x-form.input-error name="price" />
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Jumlah Pesanan</x-form.input-label>
        <x-form.input type="number" id="quantity" name="quantity" :value="old('quantity', @$order->detail->quantity)" min="1" placeholder="Jumlah Pesanan" />
        <x-form.input-error name="quantity" />
    </div>
    <div class="col-lg-6 mb-3">
        <x-form.input-label :required="true">Total Harga</x-form.input-label>
        <x-form.input type="number" id="total" name="total" :value="old('total', @$order->total)" placeholder="Total Harga" readonly />
        <x-form.input-error name="total" />
    </div>
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Bukti Transfer</x-form.input-label>
    <input type="file" name="proof" class="dropify" data-default-file="{{ old('proof', @$order->proof_url) }}" />
    <x-form.input-error name="proof" />
</div>

<div class="mb-3">
    <x-form.input-label>Catatan</x-form.input-label>
    <x-form.textarea name="notes"
        placeholder="Catatan Order">{{ old('notes', @$order->notes) }}</x-form.textarea>
    <x-form.input-error name="notes" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Status</x-form.input-label>
    <x-form.radio id="status1" name="status" type="radio" value="pending" :checked="old('status', @$order->status) == 'pending' ? true : false">
        Pending
    </x-form.radio>
    <x-form.radio id="status2" name="status" type="radio" value="waiting_confirmation" :checked="old('status', @$order->status) == 'waiting_confirmation' ? true : false">
        Waiting Confirmation
    </x-form.radio>
    <x-form.radio id="status3" name="status" type="radio" value="success" :checked="old('status', @$order->status) == 'success' ? true : false">
        Success
    </x-form.radio>
    <x-form.radio id="status4" name="status" type="radio" value="failed" :checked="old('status', @$order->status) == 'failed' ? true : false">
        Failed
    </x-form.radio>
    <x-form.radio id="status5" name="status" type="radio" value="cancelled" :checked="old('status', @$order->status) == 'cancelled' ? true : false">
        Cancelled
    </x-form.radio>
    <x-form.input-error name="status" />
</div>

@push('scripts')
    <script>
        // get data product if product_id is selected
        $('#product_id').on('change', function() {
            let product_id = $(this).val();
            if (product_id != '') {
                $.ajax({
                    url: "{{ route('admin.product.get-data') }}",
                    type: "GET",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        $('#price').val(response.price);
                    }
                });
            }else{
                $('#price').val('');
            }
        });

        // calculate total price
        $('#quantity').on('keyup', function() {
            let price = $('#price').val();
            let quantity = $(this).val();
            let total = price * quantity;
            $('#total').val(total);
        });
    </script>
@endpush