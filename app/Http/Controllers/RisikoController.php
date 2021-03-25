<?php

namespace App\Http\Controllers;

use App\Risiko;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use App\Traits\KamiTrait;
use Illuminate\Http\Request;

use Auth;
use Session;

class RisikoController extends Controller
{
    use KamiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id        = (isset(Auth::user()->id))? Auth::user()->id : null;
        $responden      = IdentitasResponden::where('user_id',$user_id)->get()->first(); 
        $responden_id   = ($responden->id ?? false)? $responden->id : null;
        $parameter      = array();
        $get_parameter  = Parameter::where('bagian','III')->get();
        $Risiko         = Risiko::where('identitas_responden_id',$responden_id)->get();
        $skor           = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'hasil_evaluasi'=> $this->risiko($responden_id),
            'skor'          => $skor
        ];
        return view('risiko.index')->with($data);
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
     * @param  \App\Risiko  $risiko
     * @return \Illuminate\Http\Response
     */
    public function show(Risiko $risiko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Risiko  $risiko
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$responden_id)
    {
        $parameter      = array();
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $get_parameter  = Parameter::where('bagian','III')->get();
        $Risiko         = Risiko::where('identitas_responden_id',$responden_id)->get();
        if ($Risiko->count() > 0){
            foreach ($Risiko as $key => $value) {
                
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
        return view('risiko.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Risiko  $risiko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $responden_id)
    {
        $request->validate([
            'identitas_responden_id' => 'required'
        ]);
        $responden  = IdentitasResponden::findOrFail($responden_id);
        $skor       = config('skor.risiko');
        
        foreach ($request->parameter_id as $key => $value) {
            $parameter = Parameter::find($value);
            $Risiko     = Risiko::where('identitas_responden_id',$responden_id)
            ->where('parameter_id',$value)
            ->first();
            if (!is_null($Risiko)) {
                $Risiko->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $Risiko->nomor = $request->skor[$key];
                $Risiko->update();
            }else{
                $Risiko_new = new Risiko;
                $Risiko_new->parameter_id   = $value;
                $Risiko_new->nomor = $request->skor[$key];
                $Risiko_new->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $Risiko_new->identitas_responden_id = $request->identitas_responden_id;
                $Risiko_new->save();
            }
        }   
        return redirect()->route('risiko.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Risiko  $risiko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Risiko $risiko)
    {
        //
    }
}
