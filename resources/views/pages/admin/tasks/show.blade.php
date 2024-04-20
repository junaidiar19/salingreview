<h5 class="fw-bold mb-3 d-flex align-items-center gap-2">
    {{ $task->name }}
    @if ($task->is_published)
        <span class="badge bg-success">Publish</span>
    @else
        <span class="badge bg-secondary">Draft</span>
    @endif
</h5>

<div class="row">
    <div class="col-md-4">
        <p class="mb-2">
            <span class="fw-medium text-dark">Id Transakasi :</span>
            <a href="{{ route('admin.orders.index', ['search' => $task->order->code]) }}" target="_blank">
                {{ $task->order->code }}
            </a>
        </p>
    </div>
    <div class="col-md-8">
        <p class="mb-2">
            <span class="fw-medium text-dark">Tanggal Mulai :</span>
            {{ formatTanggalIndo($task->start_date)->shortMonth() }}
        </p>
    </div>
    <div class="col-md-4">
        <p class="mb-2">
            <span class="fw-medium text-dark">Produk :</span>
            <a href="{{ route('admin.products.index', ['search' => $task->product->code]) }}" target="_blank">
                {{ $task->product->name }}
            </a>
        </p>
    </div>
    <div class="col-md-8">
        <p class="mb-2">
            <span class="fw-medium text-dark">Pelanggan :</span>
            <a href="{{ route('admin.users.index', ['search' => $task->user->email]) }}" target="_blank">
                {{ $task->user->name }}
            </a>
        </p>
    </div>
    <div class="col-md-4">
        <p class="mb-2">
            <span class="fw-medium text-dark">Kuota :</span>
            {{ $task->quota }}
        </p>
    </div>
    <div class="col-md-8">
        <p class="mb-2">
            <span class="fw-medium text-dark">Kuota Harian :</span>
            {{ $task->daily_quota }}
        </p>
    </div>
    <div class="col-md-4">
        <p class="mb-2">
            <span class="fw-medium text-dark">Kouta Terpenuhi :</span>
            0
        </p>
    </div>
    <div class="col-md-8">
        <p class="mb-2">
            <span class="fw-medium text-dark">Kouta Tersisa :</span>
            0
        </p>
    </div>
    <div class="col-md-4">
        <p class="mb-2">
            <span class="fw-medium text-dark">Komisi :</span>
            {{ rupiahFormat($task->commission) }}
        </p>
    </div>
    <div class="col-md-8">
        <p class="mb-2">
            <span class="fw-medium text-dark">Link Tugas :</span>
            <a href="{{ $task->link }}" target="_blank">{{ $task->task_link }}</a>
        </p>
    </div>
    <div class="col-12 my-3">
        <p class="mb-1 fw-medium text-dark">Instruksi</p>
        {!! $task->instructions !!}
    </div>
    <div class="col-12">
        <p class="mb-1 fw-medium text-dark">Kriteria</p>
        {!! $task->criteria !!}
    </div>
</div>