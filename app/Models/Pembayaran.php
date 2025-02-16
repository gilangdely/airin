<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembayaran
 * 
 * @property int $id_pembayaran
 * @property int $id_tagihan
 * @property int $id_meteran
 * @property string $id_bulan
 * @property int $tahun
 * @property float $total_nominal
 * @property Carbon $waktu_pembayaran
 * @property string $metode_pembayaran
 * @property string $catatan
 * @property string $petugas
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bulan $bulan
 * @property Meteran $meteran
 * @property Tagihan $tagihan
 * @property Collection|DetailPembayaran[] $detail_pembayarans
 *
 * @package App\Models
 */
class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'id_pembayaran';
	public $incrementing = false;

	protected $casts = [
		'id_tagihan' => 'int',
		'nomor_meteran' => 'int',
		'tahun' => 'int',
		'total_nominal' => 'float',
		'waktu_pembayaran' => 'datetime',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'id_pembayaran',
		'id_tagihan',
		'nomor_meteran',
		'id_bulan',
		'tahun',
		'total_nominal',
		'waktu_pembayaran',
		'metode_pembayaran',
		'catatan',
		'petugas',
		'created_by',
		'updated_by'
	];

	public function bulan()
	{
		return $this->belongsTo(Bulan::class, 'id_bulan');
	}

	public function meteran()
	{
		return $this->belongsTo(Meteran::class, 'nomor_meteran');
	}

	public function tagihan()
	{
		return $this->belongsTo(Tagihan::class, 'id_tagihan');
	}

	public function detail_pembayarans()
	{
		return $this->hasMany(DetailPembayaran::class, 'id_pembayaran');
	}
}
