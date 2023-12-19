<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request, $id_sesuatu) {
        $request->validate([
            'review' => 'required|string|max:255',
        ]);
    
        // Create a new review
        review::create([
            'review' => $request->input('review'),
            'verified' => false,
            'something1_id' => $id_sesuatu,
            'user_id' => auth()->user()->id, // Assuming you are using authentication
        ]);
    
        return redirect()->back()->with('pesan', 'Review added successfully');
    
    }
}
