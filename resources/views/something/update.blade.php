<x-app-layout>
    <x-slot name="header">
        <h4>Update on data number {{$id_sesuatu}}</h4>
    </x-slot>
    
    <div class="container mt-6">
        <form method="post" action="{{route('something.update', $id_sesuatu)}}" enctype="multipart/form-data">
            @csrf
            <div style="width: 30%">
                <x-input-label for="nama" :value="__('Nama')" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"/>
            </div>
            <div style="width: 30%">
                <x-input-label for="nilai" :value="__('Nilai')" />
                <x-text-input id="nilai" class="block mt-1 w-full" type="text" name="nilai"/>
            </div>
            <div style="width: 30%">
                <x-input-label for="harga" :value="__('Harga')" />
                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"/>
            </div>
            <div>
                <x-input-label for="tanggal" :value="__('Tanggal')" />
                <input name="tanggal" class="date" autocomplete="off" id="tanggal">
            </div>
            <div>
                <x-input-label for="gambar" :value="__('Gambar')" />
                <input name="gambar" type="file" autocomplete="off" id="gambar">
            </div>
            <div id="file-input-container">
                <x-input-label for="additional_gambar" :value="__('Additional Gambar')" style="display: none;" id="agLabel"/>
            
            </div>

            <button type="button" id="add-file-input" class="btn btn-info mt-3" onclick="addFileInput()">Tambah gambar lain</button>
            <div class="mt-3"><button type="submit" class="btn btn-secondary text-black">Save</button>
                <a href="/something" class="btn btn-danger">Cancel</a>
            </div>
            <div class="mt-3">
                @foreach ($dataOld -> kittens() -> get() as $kittens)
                    <div class="mt-3">
                        <img class="rounded-full object-cover object-center" src="{{asset($kittens -> path)}}" alt="" width="400"
                    </div>
                @endforeach
            </div>
        </form>
    </div>
    <script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
    });

    function addFileInput() {
    console.log("pressed");
        const container = document.getElementById('file-input-container');
        const newInput = document.createElement('div');
        document.getElementById('agLabel').style.display = 'inline';
        newInput.innerHTML = `
            <div class="mt-3">
                <input name="AG[]" type="file" autocomplete="off" id="AG">
            </div>
        `;
        container.appendChild(newInput);
    }
    </script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</x-app-layout>

