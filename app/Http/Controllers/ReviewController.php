<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the reviews existent
        // and return them as an array
        $reviews = Review::all();
        return view('reviews.index')->with(array(
            'reviews' => $reviews
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to the create page
        // return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'movie_id' => 'required|integer',
            'name' => 'required|max:191',
            'description' => 'required|max:191'
        ]);

        $review = new Review();
        $review->movie_id = $request->input('movie_id');
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->save();

        $session = $request->session()->flash('message', 'Review added successfully!');

        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.show')->with(array(
            'review'=>$review
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.edit')->with(array(
            'review' => $review
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'movie_id' => 'required|integer',
            'name' => 'required|max:191',
            'description' => 'required|max:191'
        ]);

        $review->movie_id = $request->input('movie_id');
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->save();

        $session = $request->session()->flash('message', 'Review updated successfully!');

        return redirect()->route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        Session::flash('message', 'Review deleted successfully!');

        return redirect()->route('reviews.index');
    }
}
