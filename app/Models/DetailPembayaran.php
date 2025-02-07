<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPembayaran
 * 
 * @property int $id
 * @property string $id_pembayaran
 * @property string $id_pakai
 * @property string $id_bulan
 * @property int $tahun
 * @property int $pakai
 * @property float $tarif
 * @property float $subtotal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bulan $bulan
 * @property Pemakaian $pemakaian
 *
 * @package App\Models
 */
class DetailPembayaran extends Model
{
	protected $table = 'detail_pembayaran';

	protected $casts = [
		'tahun' => 'int',
		'pakai' => 'int',
		'tarif' => 'float',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'id_pembayaran',
		'id_pakai',
		'id_bulan',
		'tahun',
		'pakai',
		'tarif',
		'subtotal'
	];

	public function bulan()
	{
		return $this->belongsTo(Bulan::class, 'id_bulan');
	}

	public function pemakaian()
	{
		return $this->belongsTo(Pemakaian::class, 'id_pakai');
	}
}
