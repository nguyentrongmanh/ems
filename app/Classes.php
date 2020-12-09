<?php

namespace App;

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name', "student_number", "teacher_id", "major_id", "academic_year"
    ];

    public function teacher() {
        return $this->belongsTo('App\User', 'teacher_id');
    }

    public function users() {
        return $this->hasMany('App\User', 'class_id');
    }

    public function major() {
        return $this->belongsTo('App\Major', 'major_id');
    }

    public function getFormatCreated()
    {
        return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
    }
}
