<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $guarded = ['id'];
    protected $fillable = ['name', 'director', 'image_url', 'duration', 'release_date', 'genres'];
    protected $casts = ['genres' => 'array'];

    const STORE_RULES = [
            'name' => 'required',
            'director' => 'required',
            'image_url' => 'required | url',
            'duration' => 'required | between: 1,500',
            'release_date' => 'required',
        ];


    static function getMovies() {
        return self::all();
        return self::all()->paginate(10);
    }

    // mutator - niz u string kad bude stizao u bazu
    public function setGenresMutator($genres){
    	$this->attributes['genres'] = json_encode($genres);
    }

    // search by movie name
    static function search($term)
    {
        $movies = self::latest()->get();
        
        // $url = $request->path();
        $url = $request->fullUrl();
        foreach ($movies as $movie) {
            return self::where($movie.name === $url)->get();
            // return self::where($movie.name === $url)->paginator($skip,$take)->get();
        }
    }


    // static function paginator($skip, $take) {

    //     $skip = request($_GET['skip']);
    //     $take = request($_GET['take']);
    //     $movies =  self::all();
    //     $movies = array_slice($movies, $skip);
    //     for($i=0; $i<$take; $i++) {
    //         $movies[] = $movie;
    //     }
    //     return $movies;
    // }


}
