<x-app-layout>
    <div class="container mt-6">
        <div style="width: 30%">
            <x-input-label for="nama" :value="__('Nama')" />
            <h2 class="my-2">{{ $data->nama_sesuatu }}</h2>
        </div>
        <div style="width: 30%">
            <x-input-label for="nilai" :value="__('Nilai')" />
            <h2 class="my-2">{{ $data->nilai_sesuatu }}</h2>
        </div>
        <div style="width: 30%">
            <x-input-label for="harga" :value="__('Harga')" />
            <h2 class="my-2">{{ $data->harga_sesuatu }}</h2>
        </div>
        <div>
            <x-input-label for="tanggal" :value="__('Tanggal')" />
            <h2 class="my-2">{{ $data->tanggal_sesuatu }}</h2>
        </div>
        @if ($data->Average_rating)
        <div>
            <x-input-label for="rating" :value="__('Average Rating')" />
            <h2 class="my-2">{{ $data->Average_rating }}</h2>
        </div>
        @else
        <div>
            <x-input-label for="rating" :value="__('Rating not avaible')" />
        </div>    
        
        @endif
        
        @if ($data->filepath)
            <div class="relative h-10 w-10">
                <a href="{{asset($data->filepath)}}" data-lightbox="image-1" data-title="thumbnail"></a>
                <img class="rounded-full object-cover object-center" src="{{ asset($data->filepath) }}" alt="" width="400">
            </div>
        @endif
        <div class="mt-3">
            @foreach ($data->kittens()->get() as $kittens)
                <div class="mt-3">
                    <a style="width: fit-content" href="{{asset($kittens->path)}}" data-lightbox="image-1" data-title={{$kittens->id}}></a>
                    <img class="rounded-full object-cover object-center" src="{{ asset($kittens->path) }}" alt="" width="400">
                </div>
            @endforeach
        </div>

        <form action="{{route('user.rate', $data->id_sesuatu)}}" method="POST">
            @csrf
            <div class="rating mt-3 bg-zinc-400">
                <h2 class="mt-3">Rating Kitten</h2>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
            </div>
            <button type="submit" class="btn btn-dark text-black">submit rating</button>
        </form>

        <form action="{{route('user.fav', $data->id_sesuatu)}}" method="POST" class="mt-3">
            @csrf
            <button class="btn btn-info">Add to Favorite</button>
        </form>

        <form action="{{ route('user.addReview', $data->id_sesuatu) }}" method="POST" class="mt-3">
            @csrf
            <div style="width: 50%">
                <x-input-label for="review" :value="__('Add Review')" />
                <textarea id="review" class="form-control" name="review" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
        
        <div class="mt-3">
            <a href="/somethingUser" class="btn btn-danger">Go Back</a>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</x-app-layout>