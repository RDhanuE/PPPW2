<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
    <title>Document</title>
</head>
<body>
@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<div class="container">
    <h4>Add something</h4>
    <form method="post" action="{{route('something.store')}}">
        @csrf
        <div>Nama = <input type="text" name="nama" id="nama_sesuatu"></div>
        <div>Nilai = <input type="text" name="nilai" id="nilai_sesuatu"></div>
        <div>Tanggal = <input name="tanggal" class="date" autocomplete="off" id="tanggal_sesuatu"></div>
        <div>Harga = <input type="text" name="harga" id="harga_sesuatu"></div>
        <div><button type="submit">Save</button>
        <a href="/testing">Cancel</a>
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
