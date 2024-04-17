<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn']) }} :disabled="loading">
    <span class="mx-auto" x-show="!loading">{{ $slot }}</span>
    <div style="display: none;" x-show="loading">
        <div class="spinner-border spinner-border-sm me-1" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span>loading...</span>
    </div>
</button>
