<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model {

	//
	
	public function post()
    {
        return $this->hasMany('App\Property');
    }
	
	public function cities()
	{
		return $this->hasMany('App\City');
	}

}
