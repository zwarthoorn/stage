<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrijf_Tool extends Model {

	protected $fillable = ['bedrijf_id','tool_id'];

	public function bedrijf()
	{
		return $this->belongsTo('App\Bedrijf');
	}
	public function tool()
	{
		return $this->belongsTo('App\Tool');
	}

}
