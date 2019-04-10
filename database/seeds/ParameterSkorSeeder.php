<?php

use Illuminate\Database\Seeder;

class ParameterSkorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('parameter_skors')->truncate();
    	DB::table('parameter_skors')->insert([
    		[
    		'type'=>  'alfabet',
    		'status'=>  'A',
    		'skor'  => 5
    		],
    		[
    		'type'=>  'alfabet',
    		'status'=>  'B',
    		'skor'  => 2
    		],
    		[
    		'type'=>  'alfabet',
    		'status'=>  'C',
    		'skor'  => 1
    		],
    		[
    		'type'=>  'sentence',
    		'status'=>  'Tidak Dilakukan',
    		'skor'  => 0
    		],
            [
            'type'=>  'sentence',
            'status'=>  'Dalam Perencanaan',
            'skor'  => 1
            ],
            [
            'type'=>  'sentence',
            'status'=>  'Dalam Penerapan / Diterapkan Sebagian',
            'skor'  => 2
            ],
            [
            'type'=>  'sentence',
            'status'=>  'Diterapkan Secara Menyeluruh',
            'skor'  => 3
            ],

            ]);
    }
}
