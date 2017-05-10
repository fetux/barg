<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyState extends Model {

	//

	
	public function post()
    {
        return $this->hasMany('App\Property');
    }
	
}
