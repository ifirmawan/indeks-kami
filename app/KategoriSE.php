<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSE extends Model
{
    protected $table = 'kategori_s_es';
    public function parameter()
    {
        return $this->belongsTo('App\Parameter','parameter_id','id');
    }
}
