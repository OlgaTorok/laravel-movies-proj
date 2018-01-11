<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Genre;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response.
     */
    public function index()
    {
        //
        $genres = Genre::orderBy('name', 'ASC')->get();
        return view('genres.index')->with(array(
            'genres' => $genres
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
        return view('genres.create');
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
            'name' => 'required|max:191'
        ]);

        $genre = new Genre();
        $genre->name = $request->input('name');
        $genre->save();

        $session = $request->session()->flash('message', 'Genre added successfully!');

        return redirect()->route('genres.index');
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
        $genre = Genre::findOrFail($id);

        return view('genres.show')->with(array(
            'genre'=>$genre
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
        $genre = Genre::findOrFail($id);

        return view('genres.edit')->with(array(
            'genre' => $genre
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
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|max:191'
        ]);

        $genre->name = $request->input('name');
        $genre->save();

        $session = $request->session()->flash('message', 'Genre updated successfully!');

        return redirect()->route('genres.index');
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
        $genre = Genre::findOrFail($id);

        $genre->delete();

        Session::flash('message', 'Genre deleted successfully!');

        return redirect()->route('genres.index');
    }
}
