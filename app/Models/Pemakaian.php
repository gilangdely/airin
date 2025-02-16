<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pemakaian
 * 
 * @property string $id_pakai
 * @property string $id_pelanggan
 * @property string $bulan
 * @property string $tahun
 * @property int $awal
 * @property int $akhir
 * @property int $pakai
 *
 * @package App\Models
 */
class Pemakaian extends Model
{
	protected $table = 'pemakaian';
	protected $primaryKey = 'id_pakai';
	public $incrementing = false;

	protected $casts = [
		'awal' => 'int',
		'akhir' => 'int',
		'pakai' => 'int'
	];

	protected $fillable = [
		'id_pakai',
		'nomor_meteran',
		'bulan',
		'tahun',
		'awal',
		'akhir',
		'pakai',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
		'id_layanan',
		'deskripsi',
		'status_pembayaran'
	];

	public function meteran(){
		return $this->belongsTo(Meteran::class, 'nomor_meteran','nomor_meteran');
	}

	public function tblbulan(){
		return $this->belongsTo(Bulan::class, 'bulan', 'id_bulan');
	}

	public function layanan(){
		return $this->belongsTo(Layanan::class, 'id_layanan', 'id_layanan');
	}
}
