<?php

namespace App\Http\Controllers;

use App\TataKelola;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use Illuminate\Http\Request;

use Auth;

class TataKelolaController extends Controller
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
        $parameter      = array();
        $responden_id   = (isset($responden->id))? $responden->id : null;
        $get_parameter  = Parameter::where('bagian','II')->get();
        $tataKelola     = TataKelola::where('identitas_responden_id',$responden_id)->get();
        $n_batas = 0;
        $n_ii   = 0;
        $n_iii  = 0;
        $n_iv   = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';
        $indeks_tata_kelola = config('indeks-kami.tata_kelola');
        if ($tataKelola->count() > 0){
            foreach ($tataKelola as $key => $value) {
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
                }
                switch ($value->parameter->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        $n_batas += intval($value->skor);  
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        $n_batas += intval($value->skor);  
                        break;
                    case '3':
                        $parameter['3'][]   = $value;
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
        
        if ($n_batas >= config('skor.kematangan.tata_kelola.batas') ) {
            $status_batas ='Valid';
        }
        
        $min_ii     = config('skor.kematangan.tata_kelola.ii.min');
        $target_ii  = config('skor.kematangan.tata_kelola.ii.target');

        $min_iii    = config('skor.kematangan.tata_kelola.iii.min');
        $target_iii = config('skor.kematangan.tata_kelola.iii.target');

        $min_iv     = config('skor.kematangan.tata_kelola.iv.min');
        $target_iv  = config('skor.kematangan.tata_kelola.iv.target');

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
        
        $hasil_evaluasi = [
            'n_batas'=> $n_batas,
            'n_ii'=> $n_ii,
            'n_iii'=> $n_iii,
            'n_iv'=> $n_iv,
            'status_batas'=> $status_batas,
            'status_ii'=> $status_ii,
            'status_iii'=> $status_iii,
            'status_iv'=> $status_iv
        ];
        $skor           = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'indeks_tata_kelola' => $indeks_tata_kelola,
            'hasil_evaluasi'=> $hasil_evaluasi
        ];
        return view('tata-kelola.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status()
    {
        $user_id        = (isset(Auth::user()->id))? Auth::user()->id : null;
        $responden      = IdentitasResponden::where('user_id',$user_id)->get()->first(); 
        $parameter      = array();
        $responden_id   = (isset($responden->id))? $responden->id : null;
        $get_parameter  = Parameter::where('bagian','II')->get();
        $tataKelola     = TataKelola::where('identitas_responden_id',$responden_id)->get();
        if ($tataKelola->count() > 0){
            foreach ($tataKelola as $key => $value) {
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
        return view('tata-kelola.status')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TataKelola  $tataKelola
     * @return \Illuminate\Http\Response
     */
    public function show(TataKelola $tataKelola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TataKelola  $tataKelola
     * @return \Illuminate\Http\Response
     */
    public function edit($responden_id)
    {
        $parameter      = array();
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $get_parameter  = Parameter::where('bagian','II')->get();
        $tataKelola     = TataKelola::where('identitas_responden_id',$responden_id)->get();
        if ($tataKelola->count() > 0){
            foreach ($tataKelola as $key => $value) {
                
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
        return view('tata-kelola.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TataKelola  $tataKelola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$responden_id)
    {
        $request->validate([
            'identitas_responden_id' => 'required'
        ]);
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $skor           = config('skor.tata_kelola');
        
        foreach ($request->parameter_id as $key => $value) {
            $parameter = Parameter::find($value);
            $tataKelola = TataKelola::where('identitas_responden_id',$responden_id)
            ->where('parameter_id',$value)
            ->first();
            if (!is_null($tataKelola)) {
                $tataKelola->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $tataKelola->nomor = $request->skor[$key];
                $tataKelola->update();
            }else{
                $tataKelola_new = new TataKelola;
                $tataKelola_new->parameter_id   = $value;
                $tataKelola_new->nomor = $request->skor[$key];
                $tataKelola_new->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $tataKelola_new->identitas_responden_id = $request->identitas_responden_id;
                $tataKelola_new->save();
            }
        }
        return redirect()->route('tata-kelola.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TataKelola  $tataKelola
     * @return \Illuminate\Http\Response
     */
    public function destroy(TataKelola $tataKelola)
    {
        //
    }
}
