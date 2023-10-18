<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <title>testing</title>
</head>
<body>
    <form action="{{route('something.search')}}" method="GET">
        @csrf
        <input type="text" name="name" id="name" class="form-control" placeholder="Cari berdasarkan nama" style="width: 30%;display:inline;margin-top:10px;margin-bottom:10px;float: left;">
    </form>
    <a href="/something" class="btn btn-warning" style="float: right; width:10%">BACK</a>
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <th>id</th>
            <th>nama</th>
            <th>nilai</th>
            <th>harga</th>
            <th>tanggal</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach($data_something as $somethhing)
            <tr>
                <td>{{$somethhing -> id_sesuatu}}</td>
                <td>{{$somethhing -> nama_sesuatu}}</td>
                <td>{{$somethhing -> nilai_sesuatu}}</td>
                <td>{{"Rp".number_format($somethhing -> harga_sesuatu, 2, ',' , '.')}}</td>
                <td>{{$somethhing -> tanggal_sesuatu -> format('d/m/Y')}}</td>
                <td>
                    <form action="{{route('something.destroy', $somethhing->id_sesuatu)}}" method="POST">
                        @csrf
                        <button onclick="return confirm('Hapus data ?')">Hapus</button>
                    </form>
                    <form action="{{route('something.edit', $somethhing->id_sesuatu)}}" method="GET">
                        @csrf
                        <button>Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>{{$data_something->links()}}</div>
    @if (count($data_something))
        <div class="alert alert-success"> Ditemukan <strong>{{count($data_something)}}</strong>data dengan nama: <strong>{{ $search }}</strong></div>
    @else
        <div class="alert alert-warning"><h4>Nama {{$search}} tidak ditemukan</h4></div>
        <a href="/something" class="btn btn-warning">BACK</a>
    @endif
    <p><strong>data = {{$banyak_data}}</strong></p>
    <p>Jumlah harga = {{"Rp".number_format($jumlah_harga, 2, ',' , '.')}}</p>
    <p align = "left"><a href="{{route('something.create')}}">PRESS FOR SOMETHING AMAZING</a></p>
</body>
</html>