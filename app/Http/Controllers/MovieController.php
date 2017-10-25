<?php

namespace App\Http\Controllers;
use App\Movie;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
	public function index()
    {
        $movies = Movie::getMovies();
        // $movies = DB::table('movies')->paginate(10);

        // return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        // return view('movies.show', compact('movie'));
    }

    public function store(Request $request)
    {
    	// $movie = new Movie;
     //    $movie->name = request('name');
     //    $movie->director = request('director');
     //    $movie->image_url = request('image_url');
     //    $movie->duration = request('duration');
     //    $movie->release_date = request('release_date');
     //    $movie->genres = request('genres');


    	$rules = Movie::STORE_RULES;
        // 1. izvrsi validaciju unetih podataka kroz formu
                // dd($request->all());

        $request->validate($rules);
        // 2. salji i sacuvaj u bazi
        $movie = Movie::create($request->all());



        // // 3. redirektuj na stranicu sa svim filovima
        // return redirect()->route('all-movies');

    	

        $movie->save();

        // return redirect('/');
    }

    public function update($id) 
    {
    	$movie = Movie::find($id);
    	$movie = $movie->fill(Input::all())->save();
    }


    public function destroy($id)
    {
    	$movie = Movie::find($id);
    	$movie->delete();
    }
}
