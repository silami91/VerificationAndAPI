<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 2/18/14
 * Time: 3:59 PM
 */

class Dvd extends Eloquent
{

    public function rating(){return $this->belongsTo('rating');}
    public function genre(){return $this->belongsTo('genre');}
    public function label(){return $this->belongsTo('label');}
    public function sound(){return $this->belongsTo('sound');}
    public function format(){return $this->belongsTo('format');}

    public static function validate($input)
    {
        return Validator::make($input, [
            'dvd_title' => 'required|min:3|alpha_num',
            'label' => 'required|numeric',
            'genre' => 'required|numeric',
            'sound' => 'required|numeric',
            'rating' => 'required|numeric',
            'format' => 'required|numeric'
        ]);
    }

    public static function search($dvd_title, $rating, $genre) //TODO: What are the parameters
    {
        $query = Dvd::with('rating','genre','label','sound','format')->take(30);

        if($dvd_title)
        {
            $query->where('title','LIKE',"%$dvd_title%");
        }
        if($rating != 'All')
        {
            $query->where('rating.id','=',"$rating");
        }
        if($genre != 'All')
        {
            $query->where('genre.id','=',"$genre");
        }

        $dvds = $query->get();

        return $dvds;
    }
}