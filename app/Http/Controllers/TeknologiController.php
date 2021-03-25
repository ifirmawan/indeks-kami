<?php

namespace App\Http\Controllers;

use App\Teknologi;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use App\Traits\KamiTrait;
use Illuminate\Http\Request;

use Auth;
use Session;

class TeknologiController extends Controller
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
        $parameter      = array();
        $responden_id   = ($responden->id ?? false)? $responden->id : null;
        $get_parameter  = Parameter::where('bagian','VI')->get();
        $Teknologi      = Teknologi::where('identitas_responden_id',$responden_id)->get();
        
        $skor       = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'skor'          => $skor,
            'hasil_evaluasi'=> $this->teknologi($responden_id)
        ];
        return view('teknologi.index')->with($data);
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
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function show(Teknologi $teknologi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$responden_id)
    {
        $parameter      = array();
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $get_parameter  = Parameter::where('bagian','VI')->get();
        $Teknologi      = Teknologi::where('identitas_responden_id',$responden_id)->get();
        if ($Teknologi->count() > 0){
            foreach ($Teknologi as $key => $value) {
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
        return view('teknologi.edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$responden_id)
    {
        $request->validate([
            'identitas_responden_id' => 'required'
        ]);
        $responden      = IdentitasResponden::findOrFail($responden_id);
        $n_request      = count($request->parameter_id);
        $skor           = config('skor.teknologi');
        
        foreach ($request->parameter_id as $key => $value) {
            $parameter = Parameter::find($value);
            $Teknologi      = Teknologi::where('identitas_responden_id',$responden_id)
            ->where('parameter_id',$value)
            ->first();
            if (!is_null($Teknologi)) {
                $Teknologi->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $Teknologi->nomor = $request->skor[$key];
                $Teknologi->update();
            }else{
                $Teknologi_new = new Teknologi;
                $Teknologi_new->parameter_id   = $value;
                $Teknologi_new->nomor = $request->skor[$key];
                $Teknologi_new->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $Teknologi_new->identitas_responden_id = $request->identitas_responden_id;
                $Teknologi_new->save();
            }
        }
        return redirect()->route('teknologi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teknologi $teknologi)
    {
        //
    }
}
