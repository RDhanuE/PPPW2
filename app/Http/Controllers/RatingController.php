<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\something1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function storeRating(Request $request, $id_sesuatu){
        $user = Auth::user();

        

        $ratingexist = rating::where('something1_id', $id_sesuatu)->where('user_id', $user -> id)->first();
        if ($ratingexist) {
            $ratingexist->update([
                'rating' => $request->input('rating'),
            ]);

            return redirect()->back()->with('success', 'Rating updated successfully');
        }

        // Create a new rating
        Rating::create([
            'something1_id' => $id_sesuatu,
            'user_id' => $user->id,
            'rating' => $request->input('rating'),
        ]);
        return redirect();
    }

    public function mostPopular(){
        $page_limit = 5;
        $data = something1::whereNotNull('Average_rating')->orderByDesc('Average_rating')->simplePaginate($page_limit);
        $banyak_data = something1::count();
        $jumlah_harga = something1::sum('nilai_sesuatu');
        $no = $page_limit - ($data->currentPage() - 1);
        return view('popular', compact('data', 'banyak_data', 'jumlah_harga', 'no'));
    
    }
}
