<?php

namespace App\Http\Controllers;

use App\IdentitasResponden;
use Illuminate\Http\Request;
use Auth;
use Session;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = (!is_null(Auth::user()->id))? Auth::user()->id : 0;
        $responden = IdentitasResponden::where('user_id',$user_id)->get()->first();
        $send = [
            'responden' => $responden,
            'user' => Auth::user(),
        ];
        return view('responden.index')->with($send);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identitas_instansi_pemerintah' => 'required',
            'email' => 'required',
            'nik' => 'required',
        ]);

        $user_id = (!is_null(Auth::user()->id))? Auth::user()->id : null;
        $responden = new IdentitasResponden;
        $responden->identitas_instansi_pemerintah = $request->identitas_instansi_pemerintah;
        $responden->email   = $request->email;
        $responden->nik     = $request->nik;
        $responden->nip     = $request->nip;
        $responden->user_id     = $user_id;
        $responden->nomor_hp    = $request->nomor_hp;
        $responden->jabatan     = $request->jabatan;
        $responden->alamat      = $request->alamat;
        
        if($responden->save()){
            Session::flash("flash_notification",['status'=>'success','message'=>'Success! Responden saved']);
        }else{
            Session::flash("flash_notification",['status'=>'warning','message'=>'Warning! Internal server error']);
        }
        return redirect()->route('responden.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IdentitasResponden  $identitasResponden
     * @return \Illuminate\Http\Response
     */
    public function show(IdentitasResponden $identitasResponden)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IdentitasResponden  $identitasResponden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $identitasResponden = IdentitasResponden::findOrFail($id);
        return view('responden.edit')->with('responden',$identitasResponden);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IdentitasResponden  $identitasResponden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responden          = IdentitasResponden::findOrFail($id);
        
        $request->validate([
            'identitas_instansi_pemerintah' => 'required',
            'email' => 'required',
            'nik' => 'required',
        ]);
        
        $responden->identitas_instansi_pemerintah = $request->identitas_instansi_pemerintah;
        $responden->email   = $request->email;
        $responden->nik     = $request->nik;
        $responden->nip     = $request->nip;
        $responden->nomor_hp    = $request->nomor_hp;
        $responden->jabatan     = $request->jabatan;
        $responden->alamat      = $request->alamat;
        
        if($responden->update()){
            Session::flash("flash_notification",['status'=>'success','message'=>'Success! Responden updated']);
        }else{
            Session::flash("flash_notification",['status'=>'warning','message'=>'Warning! Internal server error']);
        }
        return redirect()->route('responden.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IdentitasResponden  $identitasResponden
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdentitasResponden $identitasResponden)
    {
        //
    }
}
