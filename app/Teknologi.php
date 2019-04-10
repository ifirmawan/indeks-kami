<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teknologi extends Model
{
    public function parameter()
    {
        return $this->belongsTo('App\Parameter','parameter_id','id');
    }
}
