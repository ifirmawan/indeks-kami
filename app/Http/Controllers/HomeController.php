<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IdentitasResponden;
use App\TataKelola;
use App\KategoriSE;
use App\KerangkaKerja;
use App\Risiko;
use App\PengelolaanAset;
use App\Teknologi;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id    = Auth::user()->id;
        $responden  = IdentitasResponden::where('user_id',$user_id)->get()->first();
        $data       = array();
        if (isset($responden->id)) {
            $data  = [
                'skor_tata_kelola' => TataKelola::getSkor($responden->id),
                'skor_kategori_se' => KategoriSE::getSkor($responden->id),
                'skor_kerangka_kerja' => KerangkaKerja::getSkor($responden->id),
                'skor_risiko' => Risiko::getSkor($responden->id),
                'skor_teknologi' => Teknologi::getSkor($responden->id),
                'skor_pengelolaan_aset' => PengelolaanAset::getSkor($responden->id)
            ];
        }
        return view('dashboard.index',$data);
    }

    public function tentangKami()
    {
        return view('tentang_kami');
    }

    public function getJsonRadar()
    {
        $user_id        = Auth::user()->id;
        $responden      = IdentitasResponden::where('user_id',$user_id)->get()->first();
        $data_responden = [];
        if (isset($responden->id)) {
            $n1 = TataKelola::getSkor($responden->id);
            $n2 = Risiko::getSkor($responden->id);
            $n3 = KerangkaKerja::getSkor($responden->id);
            $n4 = PengelolaanAset::getSkor($responden->id);
            $n5 = KategoriSE::getSkor($responden->id);
            $data_responden = [ $n1,$n2,$n3,$n4,$n5 ];
        }
        $data = [
            [
                'label'=> 'Responden',
                'backgroundColor'=> 'rgb(179, 0, 0, 0.3)',
                'borderColor'=> '#b30000',
                'pointBackgroundColor' => '#b30000',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#b30000',
                'data' => $data_responden
            ],
            [
                'label'=> 'Kerangka Kerja Dasar',
                'backgroundColor'=> 'rgb(179, 255, 204, 0.02)',
                'borderColor'=> '#003311',
                'pointBackgroundColor' => '#b3ffcc',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#003311',
                'data' => [24,30,36,72,42]
            ],
            [
                'label'=> 'Proses Penerapan',
                'backgroundColor'=> 'rgb(0, 128, 43, 0.3)',
                'borderColor'=> '#003311',
                'pointBackgroundColor' => '#00e64d',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#003311',
                'data' => [72,54,96,132,102]
            ],
            [
                'label'=> 'Kepatuhan ISO 27001/SNI',
                'backgroundColor'=> 'rgb(0, 128, 43, 0.3)',
                'borderColor'=> '#003311',
                'pointBackgroundColor' => '#00802b',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#003311',
                'data' => [126,72,159,168,120]
            ]
        ];
        
        return response()->json($data);
    }
}
