<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', "phone", "date_of_birth", "address", 'avatar', "role", 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function classes() {
        return $this->belongsTo('App\Classes', 'class_id');
    }

    public function getFormatCreated()
    {
        return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
    }

	public function getAvatarUrl() {
        return $this->avatar ? url("/images/" . $this->avatar) : url('/images/default_avatar.png');
    }
}