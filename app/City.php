<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

	//
	
	public function post()
    {
        return $this->hasMany('App\Property');
    }

	public function barrios()
	{
		return $this->hasMany('App\Neighborhood');
	}
	
	public function provincia()
	{
		return $this->belongTo('App\Province');
	}

}
