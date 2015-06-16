<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model {

	protected $fillable = ['name','email','disc'];

	public function tools()
	{
		return $this->hasMany('App\Bedrijf_Tool');
	}

}
