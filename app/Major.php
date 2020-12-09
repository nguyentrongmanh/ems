<?php

namespace App;

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';

    protected $fillable = [
        'name', "eng_name", "banner", "dean", "phone", "introduction", "email"
    ];

    public function getFormatCreated()
    {
        return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
    }

    public function getBannerUrl() {
        return $this->banner ? url("/images/" . $this->banner) : url('/images/default_avatar.png');
    }
}
