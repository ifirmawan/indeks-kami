<?php

namespace App\Http\Controllers;

use App\PengelolaanAset;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use Illuminate\Http\Request;

use Auth;

class PengelolaanAsetController extends Controller
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
        $get_parameter  = Parameter::where('bagian','V')->get();
        $PengelolaanAset = PengelolaanAset::where('identitas_responden_id',$responden_id)->get();
        if ($PengelolaanAset->count() > 0){
            foreach ($PengelolaanAset as $key => $value) {
                
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
        return view('pengeloaan-aset.index')->with($data);
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
     * @param  \App\PengelolaanAset  $pengelolaanAset
     * @return \Illuminate\Http\Response
     */
    public function show(PengelolaanAset $pengelolaanAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengelolaanAset  $pengelolaanAset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$responden_id)
    {
        $parameter          = array();
        $responden          = IdentitasResponden::findOrFail($responden_id);
        $get_parameter      = Parameter::where('bagian','III')->get();
        $PengelolaanAset    = PengelolaanAset::where('identitas_responden_id',$responden_id)->get();
        if ($PengelolaanAset->count() > 0){
            foreach ($PengelolaanAset as $key => $value) {
                
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
        return view('pengeloaan-aset.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengelolaanAset  $pengelolaanAset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $responden_id)
    {
        $request->validate([
            'identitas_responden_id' => 'required'
        ]);
        $responden  = IdentitasResponden::findOrFail($responden_id);
        $PengelolaanAset     = PengelolaanAset::where('identitas_responden_id',$responden_id)->get();
        if ($PengelolaanAset->count() > 0) {
            $x = 0;
            foreach ($PengelolaanAset as $key => $value) {
                $PengelolaanAset_exist = PengelolaanAset::find($value->id);
                $PengelolaanAset_exist->skor = $request->skor[$x];
                $PengelolaanAset_exist->update();
                $x++;
            }
        }else{
            $x = 0;
            foreach ($request->parameter_id as $key => $value) {
                $PengelolaanAset_new = new PengelolaanAset;
                $PengelolaanAset_new->parameter_id   = $value;
                $PengelolaanAset_new->skor           = $request->skor[$x];
                $PengelolaanAset_new->identitas_responden_id = $request->identitas_responden_id;
                $PengelolaanAset_new->save();
                $x++;
            }
        }
        return redirect()->route('pengelolaan-aset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengelolaanAset  $pengelolaanAset
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengelolaanAset $pengelolaanAset)
    {
        //
    }
}
