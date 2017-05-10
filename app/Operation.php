<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model {

	//
	
	public function post()
    {
        return $this->hasMany('App\Property');
    }
	

}
