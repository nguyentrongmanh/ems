<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statics extends Model {
	protected $table = 'statics';

	public function bay()
	{
		return $this->belongsTo("App\Bay", 'bays_id');
	}

	public function busbar()
	{
		return $this->belongsTo("App\Busbar", 'busbars_id');
	}
}