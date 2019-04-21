<?php
return [
    'tata_kelola' => [
        'tahap_1' => 8,
        'tahap_2' => 8,
        'tahap_3' => 6,
        'skor_min_i'=> 48,
        'skor_min_ii'=> 12,
        'skor_pencapaian_ii'=> 36,
        'skor_min_iii'=> 8,
        'skor_pencapaian_iii'=> 14,
        'skor_min_iv'=> 24,
        'skor_pencapaian_iv'=> 54
    ],
    'risiko' => [
        'tahap_1' => 10,
        'tahap_2' => 4,
        'tahap_3' => 2,
        'skor_min_i'=> 36,
        'skor_min_ii'=> 14,
        'skor_pencapaian_ii'=> 15,
        'skor_min_iii'=> 45 ,
        'skor_pencapaian_iii'=> 62,
        'skor_min_iv'=> 8,
        'skor_pencapaian_iv'=> 12,
        'skor_min_v'=> 12,
        'skor_pencapaian_v'=> 18
    ],
    'kerangka_kerja' => [
        'tahap_1' => 64,
        'tahap_2' => 10,
        'tahap_3' => 7,
        'skor_min_i'=> 36,
        'skor_min_ii'=> 14,
        'skor_pencapaian_ii'=> 20,
        'skor_min_iii'=> 45,
        'skor_pencapaian_iii'=> 62,
        'skor_min_iv'=> 15,
        'skor_pencapaian_iv'=> 27,
        'skor_min_v'=> 12,
        'skor_pencapaian_v'=> 18
    ],
    'pengelolaan_aset' => [
        'tahap_1' => 24,
        'tahap_2' => 10,
        'tahap_3' => 4,
        'skor_min_i'=> 88,
        'skor_min_ii'=> 25,
        'skor_pencapaian_ii'=> 62,
        'skor_min_iii'=> 35,
        'skor_pencapaian_iii'=> 50
    ],
    'teknologi' => [
        'tahap_1' => 14,
        'tahap_2' => 10,
        'tahap_3' => 2,
        'skor_min_i'=> 68,
        'skor_min_ii'=> 18,
        'skor_pencapaian_ii'=> 28,
        'skor_min_iii'=> 40,
        'skor_pencapaian_iii'=> 62,
        'skor_min_iv'=> 6,
        'skor_pencapaian_iv'=> 9
    ],
    'ketergantungan_tik' => [
        'A' => [
            'bawah'=> 10,
            'atas'=> 15,
            'klasifikasi'=>'Rendah'    
        ],
        'B' => [
            'bawah'=> 16,
            'atas'=> 34,
            'klasifikasi'=>'Tinggi'    
        ],
        'C' => [
            'bawah'=> 35,
            'atas'=> 50,
            'klasifikasi'=>'Strategis'    
        ]
    ],
    'evaluasi_all' => [
        'Rendah' => [
            [
                'bawah'=> 0,
                'atas'=> 174,
                'klasifikasi'=>'Tidak Layak'    
            ],
            [
                'bawah'=> 175,
                'atas'=> 312,
                'klasifikasi'=>'Perlu Perbaikan'    
            ],
            [
                'bawah'=> 313,
                'atas'=> 535,
                'klasifikasi'=>'Cukup'    
            ],
            [
                'bawah'=> 536,
                'atas'=> 645,
                'klasifikasi'=>'Baik'    
            ]
        ],
        'Tinggi' => [
            [
                'bawah'=> 0,
                'atas'=> 272,
                'klasifikasi'=>'Tidak Layak'    
            ],
            [
                'bawah'=> 273,
                'atas'=> 455,
                'klasifikasi'=>'Perlu Perbaikan'    
            ],
            [
                'bawah'=> 456,
                'atas'=> 583,
                'klasifikasi'=>'Cukup'    
            ],
            [
                'bawah'=> 584,
                'atas'=> 645,
                'klasifikasi'=>'Baik'    
            ]
        ],
        'Strategis' => [
            [
                'bawah'=> 0,
                'atas'=> 333,
                'klasifikasi'=>'Tidak Layak'    
            ],
            [
                'bawah'=> 334,
                'atas'=> 535,
                'klasifikasi'=>'Perlu Perbaikan'    
            ],
            [
                'bawah'=> 536,
                'atas'=> 609,
                'klasifikasi'=>'Cukup'    
            ],
            [
                'bawah'=> 610,
                'atas'=> 645,
                'klasifikasi'=>'Baik'    
            ]
        ]
    ],
    'kematangan' => [
        'I' => 1,
        'I+' => 2,
        'II' => 3,
        'II+' => 4,
        'III' => 5,
        'III+' => 6,
        'IV' => 7,
        'IV+' => 8,
        'V' => 9
    ],
    'batas_valid' => [ 16,20, 24, 24, 14]
];