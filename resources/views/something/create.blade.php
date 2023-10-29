<x-app-layout>
    <x-slot name="header">
        <h4>Add something</h4>
    </x-slot>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <div class="container mt-6">
        <form method="post" action="{{route('something.store')}}">
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
            {{-- <div>Nama = <input type="text" name="nama" id="nama"></div>
            <div>Nilai = <input type="text" name="nilai" id="nilai"></div>
            <div>Harga = <input type="text" name="harga" id="harga"></div> --}}
            <div class="mt-3"><button type="submit" class="btn btn-secondary text-black">Save</button>
                <a href="/something" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    
    <script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        orientation: 'bottom'
    });
</script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</x-app-layout>
