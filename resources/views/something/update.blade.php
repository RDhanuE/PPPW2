<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div class="container">
    <h4>Update on data number {{$id_sesuatu}}</h4>
    <form method="post" action="{{route('something.update', $id_sesuatu)}}">
        @csrf
        <div>Nama = <input type="text" name="nama"></div>
        <div>Nilai = <input type="text" name="nilai"></div>
        <div>Tanggal = <input type="text" name="tanggal"></div>
        <div>Harga = <input type="text" name="harga"></div>
        <div><button type="submit">Save</button>
        <a href="/something">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
