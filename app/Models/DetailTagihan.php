<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailTagihan
 * 
 * @property int $id
 * @property int $id_tagihan
 * @property string $id_pakai
 * @property int $pakai
 * @property float $tarif
 * @property float $subtotal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Pemakaian $pemakaian
 * @property Tagihan $tagihan
 *
 * @package App\Models
 */
class DetailTagihan extends Model
{
	protected $table = 'detail_tagihan';

	protected $casts = [
		'id_tagihan' => 'int',
		'pakai' => 'int',
		'tarif' => 'float',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'id_tagihan',
		'id_pakai',
		'pakai',
		'tarif',
		'subtotal'
	];

	public function pemakaian()
	{
		return $this->belongsTo(Pemakaian::class, 'id_pakai');
	}

	public function tagihan()
	{
		return $this->belongsTo(Tagihan::class, 'id_tagihan');
	}

}
