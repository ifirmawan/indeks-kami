<?php

namespace App\Http\Controllers;

use App\KerangkaKerja;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use Illuminate\Http\Request;

use Auth;
use Session;

class KerangkaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id        = (isset(Auth::user()->id))? Auth::user()->id : null;
        $responden      = IdentitasResponden::where('user_id',$user_id)->get()->first(); 
        $responden_id   = (isset($responden->id))? $responden->id : null;
        $parameter      = array();
        $get_parameter  = Parameter::where('bagian','IV')->get();
        $KerangkaKerja  = KerangkaKerja::where('identitas_responden_id',$responden_id)->get();
        $n_batas    = 0;
        $n_ii       = 0;
        $n_iii      = 0;
        $n_iv       = 0;
        $n_v        = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';
        $status_v       = 'No';
        if ($KerangkaKerja->count() > 0){
            foreach ($KerangkaKerja as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);  
                        break;
                    case 'iv':
                        $n_iv += intval($value->skor);
                        break;
                    case 'v':
                        $n_v += intval($value->skor);
                        break;
                }
                switch ($value->parameter->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        }else if ($get_parameter->count() > 0) {
            
            foreach ($get_parameter as $key => $value) {
                switch ($value->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        }
        if ($n_batas >= config('skor.kematangan.kerangka_kerja.batas') ) {
            $status_batas ='Valid';
        }
        
        $min_ii     = config('skor.kematangan.kerangka_kerja.ii.min');
        $target_ii  = config('skor.kematangan.kerangka_kerja.ii.target');

        $min_iii    = config('skor.kematangan.kerangka_kerja.iii.min');
        $target_iii = config('skor.kematangan.kerangka_kerja.iii.target');

        $min_iv     = config('skor.kematangan.kerangka_kerja.iv.min');
        $target_iv  = config('skor.kematangan.kerangka_kerja.iv.target');

        $min_v     = config('skor.kematangan.kerangka_kerja.v.min');
        $target_v  = config('skor.kematangan.kerangka_kerja.v.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii ='i+';
        }elseif($n_ii >= $target_ii){
            $status_ii ='ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii ='ii+';
        }elseif($n_iii >= $target_iii){
            $status_iii ='iii';
        }

        if ($n_iv >= $min_iv && $n_iv < $target_iv) {
            $status_iv ='iii+';
        }elseif($n_iv >= $target_iv){
            $status_iv ='iv';
        }

        if ($n_v >= $min_v && $n_v < $target_v) {
            $status_v ='iv+';
        }elseif($n_v >= $target_v){
            $status_v ='v';
        }
        
        $hasil_evaluasi = [
            'n_batas'=> $n_batas,
            'n_ii'=> $n_ii,
            'n_iii'=> $n_iii,
            'n_iv'=> $n_iv,
            'n_v'=> $n_v,
            'status_batas'=> $status_batas,
            'status_ii'=> $status_ii,
            'status_iii'=> $status_iii,
            'status_iv'=> $status_iv,
            'status_v'=> $status_v
        ];
        $skor       = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'hasil_evaluasi'=> $hasil_evaluasi,
            'skor'          => $skor
        ];
        return view('kerangka-kerja.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KerangkaKerja  $kerangkaKerja
     * @return \Illuminate\Http\Response
     */
    public function show(KerangkaKerja $kerangkaKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KerangkaKerja  $kerangkaKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$responden_id)
    {
        $parameter      = array();
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $get_parameter  = Parameter::where('bagian','IV')->get();
        $KerangkaKerja  = KerangkaKerja::where('identitas_responden_id',$responden_id)->get();
        if ($KerangkaKerja->count() > 0){
            foreach ($KerangkaKerja as $key => $value) {
                
                switch ($value->parameter->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        }else if ($get_parameter->count() > 0) {
            foreach ($get_parameter as $key => $value) {
                switch ($value->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        }
        $skor       = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'skor'          => $skor
        ];
        return view('kerangka-kerja.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KerangkaKerja  $kerangkaKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$responden_id)
    {
        $request->validate([
            'identitas_responden_id' => 'required'
        ]);
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $skor   = config('skor.kerangka_kerja');
        foreach ($request->parameter_id as $key => $value) {
            $parameter = Parameter::find($value);
            $KerangkaKerja  = KerangkaKerja::where('identitas_responden_id',$responden_id)
            ->where('parameter_id',$value)
            ->first();
            if (!is_null($KerangkaKerja)) {
                $KerangkaKerja->skor  = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $KerangkaKerja->nomor = $request->skor[$key];
                $KerangkaKerja->update();
            }else{
                $KerangkaKerja_new = new KerangkaKerja;
                $KerangkaKerja_new->parameter_id    = $value;
                $KerangkaKerja_new->nomor           = $request->skor[$key];
                $KerangkaKerja_new->skor            = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $KerangkaKerja_new->identitas_responden_id = $request->identitas_responden_id;
                $KerangkaKerja_new->save();
            }
        }
        return redirect()->route('kerangka-kerja.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KerangkaKerja  $kerangkaKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(KerangkaKerja $kerangkaKerja)
    {
        //
    }
}
