<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
	protected $table = 'events';
	public function bay()
	{
		return $this->belongsTo("App\Bay", 'bay_id');
	}

	public function user()
	{
		return $this->belongsTo("App\User", 'user_id');
	}
}