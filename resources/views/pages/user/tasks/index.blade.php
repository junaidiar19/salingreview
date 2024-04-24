<x-user-layout>
    <h3>List Tasks</h3>
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center justify-content-between gap-3 mb-3">
                <div class="col-lg-4">
                    <x-form.select name="category">
                        <option>Pilih Kategori</option>
                    </x-form.select>
                </div>
                <div class="col-lg-3">
                    <x-filter.search />
                </div>
            </div>
            <ul class="list-group list-group-flush icons" style="list-style-type:none;">
                <li class="list-group-item px-0 py-2">
                    <a href="{{ route('user.tasks.show') }}">
                        <div class="d-flex mb-3 mb-lg-0 align-items-lg-center gap-3">
                            <div class="icon-box">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Rumah Makan</h5>
                                <p class="text-muted mb-0">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem, quia!
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="list-group-item px-0 py-2">
                    <a href="{{ route('user.tasks.show') }}">
                        <div class="d-flex mb-3 mb-lg-0 align-items-lg-center gap-3">
                            <div class="icon-box">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Rumah Makan</h5>
                                <p class="text-muted mb-0">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem, quia!
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="list-group-item px-0 py-2">
                    <a href="{{ route('user.tasks.show') }}">
                        <div class="d-flex mb-3 mb-lg-0 align-items-lg-center gap-3">
                            <div class="icon-box">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Rumah Makan</h5>
                                <p class="text-muted mb-0">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem, quia!
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-user-layout>