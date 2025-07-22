<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'title' => 'required|max:20'
        ]);

        $review = new Review([
            'content' => $request->input('content'),
            'product_id' => $request->input('product_id'),
            'user_id' => Auth::user()->id,
            'title' => $request->input('title')
        ]);
        $review->save();

        return back();
    }
}
