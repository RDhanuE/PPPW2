<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
</head>
<body>
    
<div class="container">
    <h4>Update on data number {{$id_sesuatu}}</h4>
    <form method="post" action="{{route('something.update', $id_sesuatu)}}">
        @csrf
        <div>Nama = <input type="text" name="nama" id="nama"></div>
        <div>Nilai = <input type="text" name="nilai" id="nilai"></div>
        <div>Tanggal = <input name="tanggal" class="date" autocomplete="off" id="tanggal"></div>
        <div>Harga = <input type="text" name="harga" id="harga"></div>
        <div><button type="submit">Save</button>
        <a href="/something">Cancel</a>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
    });
</script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
