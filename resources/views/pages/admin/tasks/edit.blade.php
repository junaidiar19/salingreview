<x-admin-layout>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="mb-3">
                <x-button.back :url="route('admin.tasks.index')" />
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Edit Tugas</h4>
                </div>
                <div class="card-body">
                    <x-form :action="route('admin.tasks.update', $task)">
                        @method('PUT')
                        @include('pages.admin.tasks._form')
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
