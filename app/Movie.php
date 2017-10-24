<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'director', 'image_url', 'duration', 'release_date', 'genres'];
    protected $casts = ['genres' => 'array'];



    static function getMovies() {
		return self::latest()->get();
    }



    // mutator - niz u string
    public function setGenresMutator($genres){

    	$this->attributes['genres'] = json_encode($genres);

    }


}
