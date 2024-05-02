<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::where('user_id', Auth::id())->with('libro')->get();
        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('review.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libro,id',
            'review' => 'required|max:65535',
            'puntaje' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create([
            'libro_id' => $request->libro_id,
            'user_id' => Auth::id(),
            'contenido' => $request->review,
            'puntaje' => $request->puntaje,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return redirect()->route('review.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'review' => 'required|max:65535',
            'puntaje' => 'required|integer|min:1|max:5',
        ]);

        $review->contenido = $request->review;
        $review->puntaje = $request->puntaje;
        $review->save();

        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back();
    }
}
