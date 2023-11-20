<x-app-layout>
    <section id="kittens" class="py-1 text-center bg-light">
        <div class="container">
            <h2>Nama : {{$something->nama_sesuatu}}</h2>
            <hr>
            <div class="row">
                @foreach ($kittens as $data)
                <div class="col-md-4">
                    <a href="{{asset('images/'.$data->foto)}}" data-lightbox="image-1" data-title="{{ $data->ketereangan}}">
                    <img src="{{asset('images/'.$data->foto)}}" style="width: 200px; height:150px"></a>
                    <p><h5>{{$data -> nama_kittens}}</h5></p>
                </div>
                @endforeach
            </div>
            <div>.{{$something->links()}}</div>
        </div>
    </section>
</x-app-layout>