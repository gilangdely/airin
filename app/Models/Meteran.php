<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Meteran
 * 
 * @property int $id_meteran
 * @property string $id_pelanggan
 * @property int $nomor_meteran
 * @property int $id_layanan
 * @property string $lokasi_pemasangan
 * @property Carbon $tanggal_pemasangan
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Layanan $layanan
 * @property Pelanggan $pelanggan
 *
 * @package App\Models
 */
class Meteran extends Model
{
	protected $table = 'meteran';
	protected $primaryKey = 'id_meteran';

	protected $casts = [
		'nomor_meteran' => 'int',
		'id_layanan' => 'int',
		'tanggal_pemasangan' => 'datetime',
		'status' => 'bool'
	];

	protected $fillable = [
		'id_pelanggan',
		'nomor_meteran',
		'id_layanan',
		'lokasi_pemasangan',
		'tanggal_pemasangan',
		'status'
	];

	public function layanan()
	{
		return $this->belongsTo(Layanan::class, 'id_layanan');
	}

	public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
	}
}
