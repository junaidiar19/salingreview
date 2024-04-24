<x-user-layout>
    <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
        <h3>Rumah Makan</h3>
        <x-button.back :url="route('user.tasks.index')" />
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Instruksi</h5>
            <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor illo esse officiis tempora accusamus reprehenderit odio neque. Et velit in eveniet perspiciatis voluptate expedita reprehenderit? Nostrum nisi ab eos voluptates cum cupiditate dignissimos quaerat molestiae esse quisquam quas hic quod illum ratione, sunt accusantium debitis facilis libero vero rerum assumenda.
            </p>
            <h5>Kriteria</h5>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat modi magnam libero rem quibusdam facere minima ipsa, rerum repellendus consequuntur, in, nesciunt dicta quasi saepe itaque? In aut eveniet voluptatibus adipisci rem amet nesciunt consectetur eos quod, dignissimos iusto labore quis aspernatur corrupti rerum, at similique sit. Iure, itaque modi!
            </p>

            <div class="mt-3 text-center">
                <a href="#" class="btn btn-primary btn-sm">
                    Kerjakan Tugas
                </a>
            </div>
        </div>
    </div>
</x-user-layout>