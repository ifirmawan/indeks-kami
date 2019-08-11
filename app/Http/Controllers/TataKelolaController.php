<?php

namespace App\Http\Controllers;

use App\TataKelola;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use App\Helpers\HasilEvaluasi;
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
        $skor           = ParameterSkor::where('type','sentence')->get();
        $indeks_tata_kelola = config('indeks-kami.tata_kelola');
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'indeks_tata_kelola' => $indeks_tata_kelola,
            'hasil_evaluasi'=> HasilEvaluasi::tataKelola($responden_id)
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
