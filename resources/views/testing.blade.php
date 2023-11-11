<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; margin:0%; padding:0%; justify-content:space-between; align-items:center">
            <h2 style="text-align: left; ">Data Sesuatu</h2> 
  
            <form action="{{route('something.search')}}" method="GET">
                {{-- @csrf
                <input type="text" name="name" id="name" class="form-control" placeholder="Cari berdasarkan nama" style="width: 30%;display:inline;margin-top:10px;margin-bottom:10px;float: left;"> --}}
                @csrf
                <div style="width: 150%">
                    <x-input-label for="nama" :value="__('Cari berdasarkan nama')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="name"/>
                </div>
            </form>        
        </div>
    
    </x-slot>
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <table class="table table-striped">
        <thead style="text-align: center">
            <th>id</th>
            <th>nama</th>
            <th>nilai</th>
            <th>harga</th>
            <th>tanggal</th>
            <th>action</th>
            <th>gambar</th>
        </thead>
        <tbody style="text-align: center">
            @foreach($data_something as $somethhing)
            <tr class="align-middle">
                <td>{{$somethhing -> id_sesuatu}}</td>
                <td>{{$somethhing -> nama_sesuatu}}</td>
                <td>{{$somethhing -> nilai_sesuatu}}</td>
                <td>{{"Rp".number_format($somethhing -> harga_sesuatu, 2, ',' , '.')}}</td>
                <td>{{ Carbon\Carbon::parse($somethhing->tanggal_sesuatu)->format('d/m/Y') }}</td><td>
                    <form action="{{route('something.destroy', $somethhing->id_sesuatu)}}" method="POST">
                        @csrf
                        <button onclick="return confirm('Hapus data ?')" class="btn btn-danger rounded m-1" style="width: 100px" >Hapus</button>
                    </form>
                    <form action="{{route('something.edit', $somethhing->id_sesuatu)}}" method="GET">
                        @csrf
                        <button class="btn btn-secondary rounded m-1" style="width: 100px">Update</button>
                    </form>
                </td>
                <td>
                    @if ($somethhing -> filepath)
                        <div class="relative h-10 w-10">
                            <img class="h-full w-full object-cover object-center" src="{{ asset($somethhing -> filepath) }}" alt=""/>
                        </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$data_something->links()}}
    </div>
    <div class="d-flex justify-content-center" >    
        <p><a href="{{route('something.create')}}" class="btn btn-secondary mb-3">PRESS FOR SOMETHING AMAZING</a></p>
        {{-- <p><strong>data = {{$banyak_data}}</strong></p>
        <p>Jumlah harga = {{"Rp".number_format($jumlah_harga, 2, ',' , '.')}}</p> --}}
    </div>
</x-app-layout>
