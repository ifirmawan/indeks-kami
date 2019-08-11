<?php

namespace App\Http\Controllers;

use App\KerangkaKerja;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use App\Helpers\HasilEvaluasi;
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
        
        $skor       = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'hasil_evaluasi'=> HasilEvaluasi::kerangkaKerja($responden_id),
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
