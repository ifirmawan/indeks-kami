<?php

return [
    'tata_kelola' => [1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,3,3,3,3,3,3],
    'risiko' => [1,1,1,1,1,1,1,1,1,1,2,2,2,2,3,3],
    'kerangka_kerja' => [1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,3,3,3,3,1,1,1,1,1,2,2,3,3,3],
    'pengelolaan_aset' => [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,3,3,3,1,1,1,1,1,1,2,2,2,2,3],
    'teknologi' => [1,1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,1,1,1,2,2,2,2,3,3],
    'kematangan' => [
        'tata_kelola' => [
            'batas'=> 48,
            'ii' => [
                'min'=> 12,
                'target'=> 36
            ],
            'iii' => [
                'min'=> 8,
                'target'=> 14
            ],
            'iv' => [
                'min'=> 24,
                'target'=> 54
            ]
        ],
        'risiko' => [
            'batas'=> 36,
            'ii' => [
                'min'=> 14,
                'target'=> 20
            ],
            'iii' => [
                'min'=> 4,
                'target'=> 8
            ],
            'iv' => [
                'min'=>8,
                'target'=> 12
            ],
            'v' => [
                'min'=> 12,
                'target'=> 18
            ]
        ],
        'kerangka_kerja' => [
            'batas'=> 64,
            'ii' => [
                'min'=> 15,
                'target'=> 24
            ],
            'iii' => [
                'min'=> 45,
                'target'=> 62
            ],
            'iv' => [
                'min'=>15,
                'target'=> 27
            ],
            'v' => [
                'min'=> 12,
                'target'=> 18
            ]
        ],
        'pengelolaan_aset' => [
            'batas'=> 88,
            'ii' => [
                'min'=> 25,
                'target'=> 62
            ],
            'iii' => [
                'min'=> 35,
                'target'=> 50
            ]
        ],
        'teknologi' => [
            'batas'=> 68,
            'ii' => [
                'min'=> 18,
                'target'=> 28
            ],
            'iii' => [
                'min'=> 40,
                'target'=> 62
            ],
            'iv' => [
                'min'=>6,
                'target'=> 9
            ]
        ],
    ]
];