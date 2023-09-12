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
            <th>tanggal</th>
        </thead>
        <tbody>
            @foreach($data_something as $somethhing)
            <tr>
                <td>{{$somethhing -> id_sesuatu}}</td>
                <td>{{$somethhing -> nama_sesuatu}}</td>
                <td>{{$somethhing -> nilai_sesuatu}}</td>
                <td>{{$somethhing -> tanggal_sesuatu -> format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>