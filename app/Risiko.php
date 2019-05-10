<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risiko extends Model
{
    public function parameter()
    {
        return $this->belongsTo('App\Parameter','parameter_id','id');
    }

    public static function getSkor(int $responden_id)
    {
        $data = static::where('identitas_responden_id',$responden_id)->get();
        $total  = 0;
        if ($data->count() > 0){
            foreach ($data as $key => $value) {
                $total +=intval($value->skor);
            }
        }
        return $total;
    }
}
