<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the movies existent
        // and return them as an array
        $movies = Movie::all();
        return view('movies.index')->with(array(
            'movies' => $movies
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to the page create
        return view('movies.create');
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
            'title' => 'required|max:191',
            'length' => 'required|max:191',
            'year' => 'required|integer|min:1800',
            'rating' => 'required|numeric|min:0'
        ]);

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->length = $request->input('length');
        $movie->year = $request->input('year');
        $movie->rating = $request->input('rating');
        $movie->save();

        $session = $request->session()->flash('message', 'Movie added successfully!');

        return redirect()->route('movies.index');
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
        $movie = Movie::findOrFail($id);

        return view('movies.show')->with(array(
            'movie'=>$movie
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
        //
        $movie = Movie::findOrFail($id);

        return view('movies.edit')->with(array(
            'movie' => $movie
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
        //
        $movie = Movie::findOrFail($id);

        $request->validate([
            'title' => 'required|max:191',
            'length' => 'required|max:191',
            'year' => 'required|integer|min:1800',
            'rating' => 'required|numeric|min:0'
        ]);

        $movie->title = $request->input('title');
        $movie->length = $request->input('length');
        $movie->year = $request->input('year');
        $movie->rating = $request->input('rating');
        $movie->save();

        $session = $request->session()->flash('message', 'Movie updated successfully!');

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie = Movie::findOrFail($id);

        $movie->delete();

        Session::flash('message', 'Movie deleted successfully!');

        return redirect()->route('movies.index');
    }
}
