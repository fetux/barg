<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model {
	
	
	protected $table = 'properties';
	
	public function images()
    {
        return $this->hasMany('App\PropertyImage');
    }

	public function provincia()
	{
		return $this->belongsTo('App\Province');
	}

	public function ciudad()
    {
        return $this->belongsTo('App\City');
    }
	
	public function barrio()
	{
		return $this->belongsTo('App\Neighborhood');
	}
	
	public function operacion()
	{
		return $this->belongsTo('App\Operation');
	}
	
	public function tipo()
	{
		return $this->belongsTo('App\PropertyType');
	}
	
	public function estado()
	{
		return $this->belongsTo('App\PropertyState');
	}
	
}
