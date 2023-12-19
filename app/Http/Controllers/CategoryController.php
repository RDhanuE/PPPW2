<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\something1;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $page_limit = 5;

    // Fetch all categories for the dropdown
        $categories = category::pluck('category', 'id');

        // Default to the first category if not specified in the request
        $selectedCategoryId = $request->input('category', $categories->keys()->first());

        // Fetch data for the selected category
        $data_something = something1::where('category', $selectedCategoryId)
            ->orderBy('id_sesuatu')
            ->simplePaginate($page_limit);

        $banyak_data = something1::where('category', $selectedCategoryId)->count();
        $jumlah_harga = something1::where('category', $selectedCategoryId)->sum('nilai_sesuatu');
        $no = $page_limit - ($data_something->currentPage() - 1);

        return view('category', compact('data_something', 'banyak_data', 'jumlah_harga', 'no', 'categories', 'selectedCategoryId'));
    }
}
