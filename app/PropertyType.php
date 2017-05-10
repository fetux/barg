<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model {

	//

	
	public function post()
    {
        return $this->hasMany('App\Property');
    }
	
}
