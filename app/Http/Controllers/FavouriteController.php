<?php

namespace App\Http\Controllers;

use App\Models\favourite;
use App\Models\something1;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addFav(Request $request, $id_sesuatu) {
        $user = Auth::user();
        if (!favourite::where('something1_id', $id_sesuatu)->where('user_id', $user -> id)->first()) {
            favourite::create([
                'something1_id' => $id_sesuatu,
                'user_id' => $user -> id
            ]);
        }
        return redirect()->back()->with('success', 'Added into fav');
    }

    public function showFav(){
        $user = Auth::id();
        $currentUser = User::find($user);

        // Fetch the favorited something1 IDs for the current user
        $favouriteSomething1Ids = $currentUser->fav()->pluck('something1_id');
    
        // Fetch the Something1 models based on the IDs
        $data = Something1::whereIn('id_sesuatu', $favouriteSomething1Ids)->simplePaginate(5);
    
        return view('user_favourites', compact('data'));
    }

    
}

