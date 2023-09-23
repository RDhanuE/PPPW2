<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
</head>
<body>
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
    <p>Jumlah data = {{$banyak_data}}</p>
    <p>Jumlah harga = {{"Rp".number_format($jumlah_harga, 2, ',' , '.')}}</p>
    <p align = "left"><a href="{{route('something.create')}}">PRESS FOR SOMETHING AMAZING</a></p>
</body>
</html>