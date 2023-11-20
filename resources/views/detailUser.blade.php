<x-app-layout>
    <div class="container mt-6">
        <div style="width: 30%">
            <x-input-label for="nama" :value="__('Nama')" />
            <h2 class="my-2">{{ $data->nama_sesuatu }}</h2>
        </div>
        <div style="width: 30%">
            <x-input-label for="nilai" :value="__('Nilai')" />
            <h2 class="my-2">{{ $data->nilai_sesuatu }}</h2>
        </div>
        <div style="width: 30%">
            <x-input-label for="harga" :value="__('Harga')" />
            <h2 class="my-2">{{ $data->harga_sesuatu }}</h2>
        </div>
        <div>
            <x-input-label for="tanggal" :value="__('Tanggal')" />
            <h2 class="my-2">{{ $data->tanggal_sesuatu }}</h2>
        </div>
        @if ($data->filepath)
            <div class="relative h-10 w-10">
                <a href="{{asset($data->filepath)}}" data-lightbox="image-1" data-title="thumbnail">
                <img class="rounded-full object-cover object-center" src="{{ asset($data->filepath) }}" alt="" width="400">
            </div>
        @endif
        <div class="mt-3">
            @foreach ($data->kittens()->get() as $kittens)
                <div class="mt-3">
                    <a href="{{asset($kittens->path)}}" data-lightbox="image-1" data-title={{$kittens->id}}>
                    <img class="rounded-full object-cover object-center" src="{{ asset($kittens->path) }}" alt="" width="400">
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            <a href="/somethingUser" class="btn btn-danger">Go Back</a>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</x-app-layout>