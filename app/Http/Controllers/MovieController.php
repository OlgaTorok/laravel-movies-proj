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
        // Retrieve all the movies from the database
        // and return them as an array
        // and pass the array to the index file
        $movies = Movie::orderBy('title', 'ASC')->get();
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
        // which is in movies folder
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

    /*
    *************************
    *     APIs functions
    *************************
    */

    public function apiIndex()
   {
       $data = Movie::all();
       $status = 200;
       $response = array(
           'status' => $status,
           'data' => $data
       );

       return response()->json($response);
   }


   public function apiShow($id)
    {
        $movie = Movie::find($id);
        if ($movie === null) {
            $status = 404;
            $data = null;
        }
        else {
            $status = 200;
            $data = $movie;
        }
        $response = array(
            'status' => $status,
            'data' => $data
        );

        return response()->json($response);
    }

    public function apiStore(Request $request)
    {
        $content = $request->getContent();
        $request->merge((array)json_decode($content));

        $rules = [
            'title' => 'required|max:191',
            'length' => 'required|max:191',
            'year' => 'required|integer|min:1800',
            'rating' => 'required|numeric|min:0'
        ];
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            $data = $validation->getMessageBag();
            $status = 422;
        }
        else {
            $movie = new Movie();
            $movie->title = $request->input('title');
            $movie->length = $request->input('length');
            $movie->year = $request->input('year');
            $movie->rating = $request->input('rating');
            $movie->save();

            $data = $movie;
            $status = 200;
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }


    public function apiUpdate(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($movie === null) {
            $data = null;
            $status = 404;
        }
        else {
            $content = $request->getContent();
            $request->merge((array)json_decode($content));

            $rules = [
                'title' => 'required|max:191',
                'length' => 'required|max:191',
                'year' => 'required|integer|min:1800',
                'rating' => 'required|numeric|min:0'
            ];
            $validation = Validator::make($request->all(), $rules);

            if ($validation->fails()) {
                $data = $validation->getMessageBag();
                $status = 422;
            }
            else {
                $movie->title = $request->input('title');
                $movie->length = $request->input('length');
                $movie->year = $request->input('year');
                $movie->rating = $request->input('rating');
                $movie->save();

                $data = $movie;
                $status = 200;
            }
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }


    public function apiDelete(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($movie === null) {
            $data = null;
            $status = 404;
        }
        else {
            $movie->delete();
            $data = null;
            $status = 200;
        }

        $response = array(
            'status' => $status,
            'data' => $data
        );
        return response()->json($response);
    }



}
