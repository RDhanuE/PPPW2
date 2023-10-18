<?php

namespace App\Http\Controllers;

use App\Models\something1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // $something = new something1();
        // $something -> nama_sesuatu = $request -> nama;
        // $something -> nilai_sesuatu = $request -> nilai;
        // $something -> tanggal_sesuatu = $request -> tanggal;
        // $something -> harga_sesuatu = $request -> harga;
        // $something -> save();
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
        return view('something.update', compact('id_sesuatu'));
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
        $something -> nama_sesuatu = $request -> nama;
        $something -> nilai_sesuatu = $request -> nilai;
        $something -> tanggal_sesuatu = $request -> tanggal;
        $something -> harga_sesuatu = $request -> harga;
        $something -> save();
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
