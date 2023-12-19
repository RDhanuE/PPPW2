<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; margin:0%; padding:0%; justify-content:space-between; align-items:center">
            <h2 style="text-align: left; ">Data Sesuatu</h2> 

            <form action="{{ route('something.search') }}" method="GET" style="width: 30%; display:inline;">
                @csrf
                <x-input-label for="name" :value="__('Cari berdasarkan nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
            </form>

            <form action="{{ route('category') }}" method="GET">
                <div style="width: 150%; display:inline;">
                    <x-input-label for="category" :value="__('Filter berdasarkan kategori')" />
                    <select name="category" id="category" class="form-control">
                        <option value="" {{ !$selectedCategoryId ? 'selected' : '' }}>Semua Kategori</option>
                        @foreach ($categories as $categoryId => $categoryName)
                            <option value="{{ $categoryId }}" {{ $categoryId == $selectedCategoryId ? 'selected' : '' }}>
                                {{ $categoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </x-slot>

    @if (Session::has('pesan'))
        <div class="alert alert-success">{{ Session::get('pesan') }}</div>
    @endif

    <table class="table table-striped">
        <thead style="text-align: center">
            <th>id</th>
            <th>nama</th>
            <th>nilai</th>
            <th>harga</th>
            <th>tanggal</th>
            <th>gambar</th>
            <th>Rating</th>
        </thead>
        <tbody style="text-align: center">
            @foreach($data_something as $something)
                <tr class="align-middle" onclick="window.location='{{ route('user.index', $something->id_sesuatu) }}';" style="cursor: pointer;">
                    <td>{{ $something->id_sesuatu }}</td>
                    <td>{{ $something->nama_sesuatu }}</td>
                    <td>{{ $something->nilai_sesuatu }}</td>
                    <td>{{ "Rp".number_format($something->harga_sesuatu, 2, ',' , '.') }}</td>
                    <td>{{ Carbon\Carbon::parse($something->tanggal_sesuatu)->format('d/m/Y') }}</td>
                    <td>
                        @if ($something->filepath)
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full object-cover object-center" src="{{ asset($something->filepath) }}" alt=""/>
                            </div>
                        @endif
                    </td>
                    <td>{{ $something->Average_rating }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $data_something->links() }}
    </div>
</x-app-layout>