<?php

namespace App\Traits;

/**
 * 
 */

use App\TataKelola;
use App\Parameter;
use App\Risiko;
use App\KerangkaKerja;
use App\PengelolaanAset;
use App\Teknologi;

trait KamiTrait
{
    public function getTIK($alfabet)
    {
        $data['A'] = array(
            'batas_bawah' => 10,
            'batas_atas' => 15,
            'klasifikasi' => 'Rendah',
        );
        $data['B'] = array(
            'batas_bawah' => 16,
            'batas_atas' => 34,
            'klasifikasi' => 'Tinggi',
        );
        $data['C'] = array(
            'batas_bawah' => 35,
            'batas_atas' => 50,
            'klasifikasi' => 'Strategis',
        );
        return $data[$alfabet] ?? false;
    }


    public function getEnumValues($table, $field)
    {
        $type = \DB::select(\DB::raw("SHOW COLUMNS FROM " . $table . " WHERE Field = '" . $field . "'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = collect(explode(',', $matches[1] ?? []))->map(function ($value) {
            return str_replace("'",'', $value);
        })->toArray();
        return $enum;
    }

    public function tataKelola(int $responden_id)
    {
        $get_parameter  = Parameter::where('bagian', 'II')->get();
        $tataKelola     = TataKelola::where('identitas_responden_id', $responden_id)->get();

        $n_batas = 0;
        $n_ii   = 0;
        $n_iii  = 0;
        $n_iv   = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';

        if ($tataKelola->count() > 0) {
            foreach ($tataKelola as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);
                        break;
                    case 'iv':
                        $n_iv += intval($value->skor);
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
                        $parameter['3'][]   = $value;
                        break;
                }
            }
        } else if ($get_parameter->count() > 0) {
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

        if ($n_batas >= config('skor.kematangan.tata_kelola.batas')) {
            $status_batas = 'Valid';
        }

        $min_ii     = config('skor.kematangan.tata_kelola.ii.min');
        $target_ii  = config('skor.kematangan.tata_kelola.ii.target');

        $min_iii    = config('skor.kematangan.tata_kelola.iii.min');
        $target_iii = config('skor.kematangan.tata_kelola.iii.target');

        $min_iv     = config('skor.kematangan.tata_kelola.iv.min');
        $target_iv  = config('skor.kematangan.tata_kelola.iv.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii = 'i+';
        } elseif ($n_ii >= $target_ii) {
            $status_ii = 'ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii = 'ii+';
        } elseif ($n_iii >= $target_iii) {
            $status_iii = 'iii';
        }

        if ($n_iv >= $min_iv && $n_iv < $target_iv) {
            $status_iv = 'iii+';
        } elseif ($n_iv >= $target_iv) {
            $status_iv = 'iv';
        }

        $hasil_evaluasi = [
            'n_batas' => $n_batas,
            'n_ii' => $n_ii,
            'n_iii' => $n_iii,
            'n_iv' => $n_iv,
            'status_batas' => $status_batas,
            'status_ii' => $status_ii,
            'status_iii' => $status_iii,
            'status_iv' => $status_iv
        ];
        return $hasil_evaluasi;
    }

    public function risiko(int $responden_id)
    {
        $get_parameter  = Parameter::where('bagian', 'III')->get();
        $Risiko         = Risiko::where('identitas_responden_id', $responden_id)->get();
        $n_batas    = 0;
        $n_ii       = 0;
        $n_iii      = 0;
        $n_iv       = 0;
        $n_v        = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';
        $status_v       = 'No';
        if ($Risiko->count() > 0) {
            foreach ($Risiko as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);
                        break;
                    case 'iv':
                        $n_iv += intval($value->skor);
                        break;
                    case 'v':
                        $n_v += intval($value->skor);
                        break;
                }
                switch ($value->parameter->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        } else if ($get_parameter->count() > 0) {
            foreach ($get_parameter as $key => $value) {
                switch ($value->kategori_kontrol) {
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
        }
        if ($n_batas >= config('skor.kematangan.risiko.batas')) {
            $status_batas = 'Valid';
        }

        $min_ii     = config('skor.kematangan.risiko.ii.min');
        $target_ii  = config('skor.kematangan.risiko.ii.target');

        $min_iii    = config('skor.kematangan.risiko.iii.min');
        $target_iii = config('skor.kematangan.risiko.iii.target');

        $min_iv     = config('skor.kematangan.risiko.iv.min');
        $target_iv  = config('skor.kematangan.risiko.iv.target');

        $min_v     = config('skor.kematangan.risiko.iv.min');
        $target_v  = config('skor.kematangan.risiko.iv.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii = 'i+';
        } elseif ($n_ii >= $target_ii) {
            $status_ii = 'ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii = 'ii+';
        } elseif ($n_iii >= $target_iii) {
            $status_iii = 'iii';
        }

        if ($n_iv >= $min_iv && $n_iv < $target_iv) {
            $status_iv = 'iii+';
        } elseif ($n_iv >= $target_iv) {
            $status_iv = 'iv';
        }

        if ($n_v >= $min_v && $n_v < $target_v) {
            $status_v = 'iv+';
        } elseif ($n_v >= $target_v) {
            $status_v = 'v';
        }

        $hasil_evaluasi = [
            'n_batas' => $n_batas,
            'n_ii' => $n_ii,
            'n_iii' => $n_iii,
            'n_iv' => $n_iv,
            'n_v' => $n_v,
            'status_batas' => $status_batas,
            'status_ii' => $status_ii,
            'status_iii' => $status_iii,
            'status_iv' => $status_iv,
            'status_v' => $status_v
        ];
        return $hasil_evaluasi;
    }

    public function kerangkaKerja(int $responden_id)
    {
        $get_parameter  = Parameter::where('bagian', 'IV')->get();
        $KerangkaKerja  = KerangkaKerja::where('identitas_responden_id', $responden_id)->get();
        $n_batas    = 0;
        $n_ii       = 0;
        $n_iii      = 0;
        $n_iv       = 0;
        $n_v        = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';
        $status_v       = 'No';
        if ($KerangkaKerja->count() > 0) {
            foreach ($KerangkaKerja as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);
                        break;
                    case 'iv':
                        $n_iv += intval($value->skor);
                        break;
                    case 'v':
                        $n_v += intval($value->skor);
                        break;
                }
                switch ($value->parameter->kategori_kontrol) {
                    case '1':
                        $parameter['1'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '2':
                        $parameter['2'][] = $value;
                        $n_batas += $value->skor;
                        break;
                    case '3':
                        $parameter['3'][] = $value;
                        break;
                }
            }
        } else if ($get_parameter->count() > 0) {

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
        if ($n_batas >= config('skor.kematangan.kerangka_kerja.batas')) {
            $status_batas = 'Valid';
        }

        $min_ii     = config('skor.kematangan.kerangka_kerja.ii.min');
        $target_ii  = config('skor.kematangan.kerangka_kerja.ii.target');

        $min_iii    = config('skor.kematangan.kerangka_kerja.iii.min');
        $target_iii = config('skor.kematangan.kerangka_kerja.iii.target');

        $min_iv     = config('skor.kematangan.kerangka_kerja.iv.min');
        $target_iv  = config('skor.kematangan.kerangka_kerja.iv.target');

        $min_v     = config('skor.kematangan.kerangka_kerja.v.min');
        $target_v  = config('skor.kematangan.kerangka_kerja.v.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii = 'i+';
        } elseif ($n_ii >= $target_ii) {
            $status_ii = 'ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii = 'ii+';
        } elseif ($n_iii >= $target_iii) {
            $status_iii = 'iii';
        }

        if ($n_iv >= $min_iv && $n_iv < $target_iv) {
            $status_iv = 'iii+';
        } elseif ($n_iv >= $target_iv) {
            $status_iv = 'iv';
        }

        if ($n_v >= $min_v && $n_v < $target_v) {
            $status_v = 'iv+';
        } elseif ($n_v >= $target_v) {
            $status_v = 'v';
        }

        $hasil_evaluasi = [
            'n_batas' => $n_batas,
            'n_ii' => $n_ii,
            'n_iii' => $n_iii,
            'n_iv' => $n_iv,
            'n_v' => $n_v,
            'status_batas' => $status_batas,
            'status_ii' => $status_ii,
            'status_iii' => $status_iii,
            'status_iv' => $status_iv,
            'status_v' => $status_v
        ];
        return $hasil_evaluasi;
    }

    public function pengelolaanAset(int $responden_id)
    {
        $get_parameter  = Parameter::where('bagian', 'V')->get();
        $PengelolaanAset = PengelolaanAset::where('identitas_responden_id', $responden_id)->get();
        $n_batas = 0;
        $n_ii   = 0;
        $n_iii  = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';

        if ($PengelolaanAset->count() > 0) {
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
        } else if ($get_parameter->count() > 0) {
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
        if ($n_batas >= config('skor.kematangan.pengelolaan_aset.batas')) {
            $status_batas = 'Valid';
        }

        $min_ii     = config('skor.kematangan.pengelolaan_aset.ii.min');
        $target_ii  = config('skor.kematangan.pengelolaan_aset.ii.target');

        $min_iii    = config('skor.kematangan.pengelolaan_aset.iii.min');
        $target_iii = config('skor.kematangan.pengelolaan_aset.iii.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii = 'i+';
        } elseif ($n_ii >= $target_ii) {
            $status_ii = 'ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii = 'ii+';
        } elseif ($n_iii >= $target_iii) {
            $status_iii = 'iii';
        }
        $hasil_evaluasi = [
            'n_batas' => $n_batas,
            'n_ii' => $n_ii,
            'n_iii' => $n_iii,
            'status_batas' => $status_batas,
            'status_ii' => $status_ii,
            'status_iii' => $status_iii
        ];
        return $hasil_evaluasi;
    }

    public function teknologi(int $responden_id)
    {
        $get_parameter  = Parameter::where('bagian', 'VI')->get();
        $Teknologi      = Teknologi::where('identitas_responden_id', $responden_id)->get();
        $n_batas = 0;
        $n_ii   = 0;
        $n_iii  = 0;
        $n_iv   = 0;
        $status_batas   = 'Invalid';
        $status_ii      = 'No';
        $status_iii     = 'No';
        $status_iv      = 'No';
        if ($Teknologi->count() > 0) {
            foreach ($Teknologi as $key => $value) {
                switch ($value->parameter->tahap) {
                    case 'ii':
                        $n_ii += intval($value->skor);
                        break;
                    case 'iii':
                        $n_iii += intval($value->skor);
                        break;
                    case 'iv':
                        $n_iv += intval($value->skor);
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
        } else if ($get_parameter->count() > 0) {
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
        if ($n_batas >= config('skor.kematangan.teknologi.batas')) {
            $status_batas = 'Valid';
        }

        $min_ii     = config('skor.kematangan.teknologi.ii.min');
        $target_ii  = config('skor.kematangan.teknologi.ii.target');

        $min_iii    = config('skor.kematangan.teknologi.iii.min');
        $target_iii = config('skor.kematangan.teknologi.iii.target');

        $min_iv     = config('skor.kematangan.teknologi.iv.min');
        $target_iv  = config('skor.kematangan.teknologi.iv.target');

        if ($n_ii >= $min_ii && $n_ii < $target_ii) {
            $status_ii = 'i+';
        } elseif ($n_ii >= $target_ii) {
            $status_ii = 'ii';
        }

        if ($n_iii >= $min_iii && $n_iii < $target_iii) {
            $status_iii = 'ii+';
        } elseif ($n_iii >= $target_iii) {
            $status_iii = 'iii';
        }

        if ($n_iv >= $min_iv && $n_iv < $target_iv) {
            $status_iv = 'iii+';
        } elseif ($n_iv >= $target_iv) {
            $status_iv = 'iv';
        }

        return [
            'n_batas' => $n_batas,
            'n_ii' => $n_ii,
            'n_iii' => $n_iii,
            'n_iv' => $n_iv,
            'status_batas' => $status_batas,
            'status_ii' => $status_ii,
            'status_iii' => $status_iii,
            'status_iv' => $status_iv
        ];
    }
}
