<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class PropertyImage extends Model {


	 protected $fillable = ['property_id','url','slide_url','thumb_url','thumb2_url'];
	//
	
	public function post()
    {
        return $this->belongsTo('App\Property');
    }

}
