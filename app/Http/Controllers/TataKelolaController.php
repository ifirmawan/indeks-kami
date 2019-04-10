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
        return view('tata-kelola.index')->with($data);
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
        $responden  = IdentitasResponden::findOrFail($responden_id);
        $tataKelola = TataKelola::where('identitas_responden_id',$responden_id)->get();
        if ($tataKelola->count() > 0) {
            $x = 0;
            foreach ($tataKelola as $key => $value) {
                $tataKelola_exist = TataKelola::find($value->id);
                $tataKelola_exist->skor = $request->skor[$x];
                $tataKelola_exist->update();
                $x++;
            }
        }else{
            $x = 0;
            foreach ($request->parameter_id as $key => $value) {
                $tataKelola_new = new TataKelola;
                $tataKelola_new->parameter_id   = $value;
                $tataKelola_new->skor           = $request->skor[$x];
                $tataKelola_new->identitas_responden_id = $request->identitas_responden_id;
                $tataKelola_new->save();
                $x++;
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
