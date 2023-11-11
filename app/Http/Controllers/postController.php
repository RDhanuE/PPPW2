<?php

namespace App\Http\Controllers;

use App\Models\kittens;
use App\Models\something1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_limit = 5;
        $data_something = something1::orderBy('id_sesuatu')->simplePaginate($page_limit);
        $banyak_data = something1::count();
        $jumlah_harga = something1::sum('nilai_sesuatu');
        $no = $page_limit - ($data_something->currentPage() - 1);
        return view('testing', compact('data_something', 'banyak_data', 'jumlah_harga', 'no'));
    }

    public function search(Request $request)
    {
        $page_limit = 5;
        $search = $request -> name;
        $data_something = something1::where('nama_sesuatu', 'like', "%".$search."%") -> simplePaginate($page_limit);
        $banyak_data = $data_something->count();
        $jumlah_harga = $data_something->sum('harga_sesuatu');
        $no = $page_limit - ($data_something->currentPage() - 1);
        return view('something.search', compact('data_something', 'banyak_data', 'jumlah_harga', 'no', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('something.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:40',
            'nilai' => 'required|numeric',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric'
        ]);

        
        $filename = time().'_'.$request->gambar->getClientOriginalName();
        $filepath = $request -> file('gambar')->storeAs('uploads', $filename, 'public');

        Image::make(storage_path().'/app/public/uploads/'.$filename)
        ->fit(90, 120)
        ->save();

        $something = new something1();
        $something -> nama_sesuatu = $request -> nama;
        $something -> nilai_sesuatu = $request -> nilai;
        $something -> tanggal_sesuatu = $request -> tanggal;
        $something -> harga_sesuatu = $request -> harga;
        $something -> filename = $filename;
        $something -> filepath = '/storage/'.$filepath;
        $something -> save();

        if($request->hasFile('AG')) {
            foreach ($request->file('AG') as $file) {
                Log::info("entered");
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('uploads', $filename, 'public');
        
                kittens::create([
                    'nama_kittens' => $filename,
                    'path' => '/storage/' . $filepath,
                    'foto' => $filename,
                    'something1_id' => $something -> id_sesuatu
                ]);
            }
        }

        return redirect('/something')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sesuatu)
    {
        $dataOld = something1::find($id_sesuatu);
        return view('something.update', compact('id_sesuatu', 'dataOld'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sesuatu){
        $something = something1::find($id_sesuatu);
        
        $this->validate($request, [
            'nama' => 'required|string|max:40',
            'nilai' => 'required|numeric',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'additional_gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if($request->hasFile('AG')) {
            foreach ($request->file('AG') as $file) {
                Log::info("entered");
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('uploads', $filename, 'public');
        
                kittens::create([
                    'nama_kittens' => $filename,
                    'path' => '/storage/' . $filepath,
                    'foto' => $filename,
                    'something1_id' => $id_sesuatu
                ]);
            }
        }

        $filename = time().'_'.$request->gambar->getClientOriginalName();
        $filepath = $request -> file('gambar')->storeAs('uploads', $filename, 'public');

        Image::make(storage_path().'/app/public/uploads/'.$filename)
        ->fit(90, 120)
        ->save();


        $something -> update([
            'nama_sesuatu'=> $request -> nama,
            'nilai_sesuatu'=> $request -> nilai,
            'tanggal_sesuatu'=> $request -> tanggal,
            'harga_sesuatu'=> $request -> harga,
            'filename' => $filename,
            'filepath'=> '/storage/'.$filepath
        ]);

        return redirect('/something')->with('pesan', 'Data berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sesuatu)
    {
        $something = something1::find($id_sesuatu);
        $something->kittens()->delete();
        $something->delete();
        $maxId = DB::table('something1')->count('id_sesuatu');
        DB::statement("ALTER TABLE something1 AUTO_INCREMENT = $maxId");

        return redirect('/something')->with('pesan', 'Data berhasil dihapus');
    }

    public function testing()
    {
        return view('testing');
    }
}
