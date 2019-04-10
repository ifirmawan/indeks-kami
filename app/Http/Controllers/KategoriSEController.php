<?php

namespace App\Http\Controllers;

use App\KategoriSE;
use App\Parameter;
use App\ParameterSkor;
use App\IdentitasResponden;
use Illuminate\Http\Request;
use App\Helpers\KamiHelper;
use Auth;

class KategoriSEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id            = Auth::user()->id;
        $parameter          = Parameter::where('bagian','I')->get();
        $responden          = IdentitasResponden::where('user_id',$user_id)->get()->first();
        if (isset($responden->id)) {
            $kategori_se        = KategoriSE::where('identitas_responden_id',$responden->id)->get();
            if ($kategori_se->count() > 0) {
                $parameter      = $kategori_se;
            }
            $data['kategori_se']= $kategori_se;
        }
        $data['parameter']  = $parameter;
        $data['responden']  = $responden;
        return view('kategori-se.index',$data);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriSE  $kategoriSE
     * @return \Illuminate\Http\Response
     */
    public function show($responden_id)
    {
        $data['kategori_se']= KategoriSE::where('identitas_responden_id',$responden_id)->get();
        return view('kategori-se.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriSE  $kategoriSE
     * @return \Illuminate\Http\Response
     */
    public function edit($responden_id)
    { 
        $kategoriSE         = KategoriSE::where('identitas_responden_id',$responden_id)->get();
        $send               = array();
        $parameter          = Parameter::where('bagian','I')->get();
        $data['parameter']  = $parameter;
        $data['skor']       = ParameterSkor::where('type','alfabet')->get();
        $data['kategoriSE'] = $kategoriSE;
        $data['responden']  = IdentitasResponden::findOrFail($responden_id);
        $data['skor']       = KamiHelper::getEnumValues('kategori_s_es','skor');
        return view('kategori-se.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriSE  $kategoriSE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $responden_id)
    { 
        $kategoriSE = KategoriSE::where('identitas_responden_id',$responden_id)->get();
        if (is_null($kategoriSE->first())) {
            $x = 0;
            foreach ($request->parameter_id as $key => $value) {
                $kategoriSE_new = new KategoriSE;
                $kategoriSE_new->identitas_responden_id = $responden_id;
                $kategoriSE_new->parameter_id           = $value;
                $kategoriSE_new->skor                   = (isset($request->skor[$x]))? $request->skor[$x] : null;
                $kategoriSE_new->save(); 
                $x++;
            }
        }else{
            $x = 0;
            foreach ($kategoriSE as $key => $value) {
                if (is_null($value->skor)) {
                    $kategoriSE_update = KategoriSE::find($value->id);
                    $kategoriSE_update->skor = (isset($request->skor[$x]))? $request->skor[$x] : null;
                    $kategoriSE_update->update(); 
                }
                
                $x++;
            }
        }
        return redirect()->route('kategori-se.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriSE  $kategoriSE
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriSE $kategoriSE)
    {
        //
    }
}
