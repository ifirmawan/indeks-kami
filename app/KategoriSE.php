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
    
    public static function getSkor(int $responden_id)
    {
        $data = static::where('identitas_responden_id',$responden_id)->get();
        $total = 0;
        $skor['A'] = 5;
        $skor['B'] = 2;
        $skor['C'] = 1;
        if ($data->count() > 0){
            foreach ($data as $key => $value) {
                if (isset($skor[$value->skor])) {
                    $total += intval($skor[$value->skor]);
                }
            }
        }
        return $total;
    }
}
