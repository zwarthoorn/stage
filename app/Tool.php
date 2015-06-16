<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model {

	protected $fillable = ['name','version'];

	public function bedrijf()
	{
		return $this->hasMany('App\Bedrijf_Tool');
	}

}
