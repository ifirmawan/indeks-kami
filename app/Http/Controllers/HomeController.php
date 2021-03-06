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
use App\Traits\KamiTrait;
use Auth;

class HomeController extends Controller
{
    use KamiTrait;
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
        if (!is_null($responden)) {
            $n1         = TataKelola::getSkor($responden->id ?? 0);
            $n2         = Risiko::getSkor($responden->id ?? 0);
            $n3         = KerangkaKerja::getSkor($responden->id ?? 0);
            $n4         = PengelolaanAset::getSkor($responden->id ?? 0);
            $n5         = Teknologi::getSkor($responden->id ?? 0);
            $total_se   = KategoriSE::getSkor($responden->id ?? 0);
            $batas_valid        = config('indeks-kami.batas_valid');
            $batas_se           = config('indeks-kami.ketergantungan_tik');
            $evaluasi_all       = config('indeks-kami.evaluasi_all');
            $total              = intval($n1 + $n2 + $n3 + $n4 + $n5);
            
            $evaluasi_se        = '';
            $hasil_evaluasi_all = '';
            foreach ($batas_se as $key => $value) {
                if ($key == 'A' && ($total_se >= $value['bawah'] && $total_se <= $value['atas'] )) {
                    $evaluasi_se = $value['klasifikasi'];
                }
                if ($key == 'B' && ($total_se >= $value['bawah'] && $total_se <= $value['atas'] )) {
                    $evaluasi_se = $value['klasifikasi'];
                }
                if ($key == 'C' && ($total_se >= $value['bawah'] && $total_se <= $value['atas'] )) {
                    $evaluasi_se = $value['klasifikasi'];
                }
            }

            if (
                $n1 >= $batas_valid[0] &&
                $n2 >= $batas_valid[1] &&
                $n3 >= $batas_valid[2] &&
                $n4 >= $batas_valid[3] &&
                $n5 >= $batas_valid[4]
                ) {
                if (isset($evaluasi_all[$evaluasi_se])) {
                    if ($total >= $evaluasi_all[$evaluasi_se][0]['bawah'] && $total <= $evaluasi_all[$evaluasi_se][0]['atas'] ) {
                        $hasil_evaluasi_all = $evaluasi_all[$evaluasi_se][0]['klasifikasi'];
                    }
                    if ($total >= $evaluasi_all[$evaluasi_se][1]['bawah'] && $total <= $evaluasi_all[$evaluasi_se][1]['atas'] ) {
                        $hasil_evaluasi_all = $evaluasi_all[$evaluasi_se][1]['klasifikasi'];
                    }
                    if ($total >= $evaluasi_all[$evaluasi_se][2]['bawah'] && $total <= $evaluasi_all[$evaluasi_se][2]['atas'] ) {
                        $hasil_evaluasi_all = $evaluasi_all[$evaluasi_se][2]['klasifikasi'];
                    }
                    if ($total >= $evaluasi_all[$evaluasi_se][3]['bawah'] && $total <= $evaluasi_all[$evaluasi_se][3]['atas'] ) {
                        $hasil_evaluasi_all = $evaluasi_all[$evaluasi_se][3]['klasifikasi'];
                    }
                }
            }else{
                $hasil_evaluasi_all ='Tidak Layak';
            }
            
            if ($responden->id ?? false) {
                $data  = [
                    'skor_tata_kelola' => $n1,
                    'skor_risiko' => $n2,
                    'skor_kerangka_kerja' => $n3,
                    'skor_pengelolaan_aset' => $n4,
                    'skor_teknologi' => $n5,
                    'skor_kategori_se' => $total_se,
                    'total' => $total,
                    'hasil_evaluasi_all' => $hasil_evaluasi_all
                ];
            }
        }
        

        $data['hasil_tata_kelola']      = $this->tataKelola($responden->id ?? 0);
        $data['hasil_risiko']           = $this->risiko($responden->id ?? 0);
        $data['hasil_kerangka_kerja']   = $this->kerangkaKerja($responden->id ?? 0);
        $data['hasil_pengelolaan_aset'] = $this->pengelolaanAset($responden->id ?? 0);
        $data['hasil_teknologi']        = $this->teknologi($responden->id ?? 0);

        return view('dashboard.index',$data);
    }

    public function tentangKami()
    {
        return view('tentang_kami');
    }

    public function petunjukKami()
    {
        return view('petunjuk_kami');
    }

    public function getJsonRadar()
    {
        $user_id        = Auth::user()->id;
        $responden      = IdentitasResponden::where('user_id',$user_id)->get()->first();
        $data_responden = [];
        if ($responden->id ?? false) {
            $n1 = TataKelola::getSkor($responden->id ?? 0);
            $n2 = Risiko::getSkor($responden->id ?? 0);
            $n3 = KerangkaKerja::getSkor($responden->id ?? 0);
            $n4 = PengelolaanAset::getSkor($responden->id ?? 0);
            $n5 = Teknologi::getSkor($responden->id ?? 0);
            
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
                'backgroundColor'=> 'rgb(0, 0, 255, 0.02)',
                'borderColor'=> '#0000ff',
                'pointBackgroundColor' => '#0000ff',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#0000ff',
                'data' => [24,30,36,72,42]
            ],
            [
                'label'=> 'Proses Penerapan',
                'backgroundColor'=> 'rgb(255, 102, 0, 0.3)',
                'borderColor'=> '#ff6600',
                'pointBackgroundColor' => '#ff6600',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#ff6600',
                'data' => [72,54,96,132,102]
            ],
            [
                'label'=> 'Kepatuhan ISO 27001/SNI',
                'backgroundColor'=> 'rgb(0, 128, 43, 0.3)',
                'borderColor'=> '#00802b',
                'pointBackgroundColor' => '#00802b',
                'pointBorderColor'=> '#fff',
                'pointHoverBackgroundColor' => '#fff',
                'pointHoverBorderColor' => '#00802b',
                'data' => [126,72,159,168,120]
            ]
        ];
        
        return response()->json($data);
    }
}
