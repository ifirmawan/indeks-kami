<?php

namespace App\Http\Controllers;

use App\PengelolaanAset;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use Illuminate\Http\Request;

use Auth;
use Session;

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
        $n_batas = 0;
        $n_ii   = 0;
        $n_iii  = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';        
        
        if ($PengelolaanAset->count() > 0){
            foreach ($PengelolaanAset as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);  
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
        $n_batas = $n_batas - 6;
        if ($n_batas >= config('skor.kematangan.pengelolaan_aset.batas') ) {
            $status_batas ='Valid';
        }
        
        $min_ii     = config('skor.kematangan.pengelolaan_aset.ii.min');
        $target_ii  = config('skor.kematangan.pengelolaan_aset.ii.target');

        $min_iii    = config('skor.kematangan.pengelolaan_aset.iii.min');
        $target_iii = config('skor.kematangan.pengelolaan_aset.iii.target');

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
        $hasil_evaluasi = [
            'n_batas'=> $n_batas,
            'n_ii'=> $n_ii,
            'n_iii'=> $n_iii,
            'status_batas'=> $status_batas,
            'status_ii'=> $status_ii,
            'status_iii'=> $status_iii
        ];
        $skor       = ParameterSkor::where('type','sentence')->get();
        $data = [
            'responden'     => $responden,
            'parameter'     => $parameter,
            'skor'          => $skor,
            'hasil_evaluasi'=> $hasil_evaluasi
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
        $get_parameter      = Parameter::where('bagian','V')->get();
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
        $responden       = IdentitasResponden::findOrFail($responden_id);
        $skor            = config('skor.pengelolaan_aset');
        foreach ($request->parameter_id as $key => $value) {
            $parameter = Parameter::find($value);
            $PengelolaanAset = PengelolaanAset::where('identitas_responden_id',$responden_id)
            ->where('parameter_id',$value)
            ->first();
            if (!is_null($PengelolaanAset)) {
                $PengelolaanAset->skor  = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $PengelolaanAset->nomor = $request->skor[$key];
                $PengelolaanAset->update();
            }else{
                $PengelolaanAset_new = new PengelolaanAset;
                $PengelolaanAset_new->parameter_id   = $value;
                $PengelolaanAset_new->nomor = $request->skor[$key];
                $PengelolaanAset_new->skor = intval($request->skor[$key]) * intval($parameter->kategori_kontrol);
                $PengelolaanAset_new->identitas_responden_id = $request->identitas_responden_id;
                $PengelolaanAset_new->save();
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
