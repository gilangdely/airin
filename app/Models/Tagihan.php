<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tagihan
 * 
 * @property int $id_tagihan
 * @property string $id_bulan
 * @property int $tahun
 * @property string $id_pelanggan
 * @property float $nominal
 * @property Carbon $waktu_awal
 * @property Carbon $waktu_akhir
 * @property bool $status_tagihan
 * @property bool $status_pembayaran
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bulan $bulan
 * @property Pelanggan $pelanggan
 *
 * @package App\Models
 */
class Tagihan extends Model
{
	protected $table = 'tagihan';
	protected $primaryKey = 'id_tagihan';
	protected $with = ['pelanggan', 'meteran', 'bulan'];

	protected $casts = [
		'tahun' => 'int',
		'nominal' => 'float',
		'waktu_awal' => 'datetime',
		'waktu_akhir' => 'datetime',
		'status_tagihan' => 'bool',
		'status_pembayaran' => 'bool'
	];

	protected $fillable = [
		'id_tagihan',
		'id_bulan',
		'tahun',
		'id_pelanggan',
		'id_meteran',
		'nominal',
		'waktu_awal',
		'waktu_akhir',
		'status_tagihan',
		'status_pembayaran',
		'created_by',
		'updated_by'
	];

	public function bulan()
	{
		return $this->belongsTo(Bulan::class, 'id_bulan');
	}

	public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
	}

	public function meteran(){
		return $this->belongsTo(Meteran::class,'id_meteran');
	}

	public function detailtagihan(){
		return $this->hasMany(DetailTagihan::class, 'id_tagihan');
	}
}

