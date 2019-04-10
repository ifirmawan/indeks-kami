<?php

namespace App\Helpers;

use DB;

class KamiHelper{

	public static function getTIK($alfabet)
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
		return (isset($data[$alfabet]))? $data[$alfabet] : false;
	}

	public static function getStatusTIK($total_skor)
	{
		$data = array(
			array('from'=>0,'to'=>174,'status'=>'Tidak Layak'),
			array('from'=>175,'to'=>312,'status'=>'Perlu Perbaikan'),
			array('from'=>313,'to'=>535,'status'=>'Cukup'),
			array('from'=>536,'to'=>645,'status'=>'Baik')			
		);
		$status = '';
		foreach ($data as $key => $value) {
			/*if ($value['from'] < $total_skor < $value['to']) {
				$status = $value['status'];
			}*/
		}
		return $status;
	}

	public static function getEnumValues($table, $field)
	{
		$type = DB::select( DB::raw("SHOW COLUMNS FROM ".$table." WHERE Field = '" .$field. "'") )[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value )
		{
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
	}

}