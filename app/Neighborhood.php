<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model {

	//
	public function post()
    {
        return $this->hasMany('App\Property');
    }

	public function ciudad()
	{
		$this->belongsTo('App\City');
	}	

}

