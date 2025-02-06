<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TarifLayanan
 * 
 * @property int $id_tarif_layanan
 * @property int $id_layanan
 * @property string $tier
 * @property int $min_pemakaian
 * @property int|null $max_pemakaian
 * @property float $tarif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Layanan $layanan
 *
 * @package App\Models
 */
class TarifLayanan extends Model
{
	protected $table = 'tarif_layanan';
	protected $primaryKey = 'id_tarif_layanan';

	protected $casts = [
		'id_layanan' => 'int',
		'min_pemakaian' => 'int',
		'max_pemakaian' => 'int',
		'tarif' => 'float'
	];

	protected $fillable = [
		'id_layanan',
		'tier',
		'min_pemakaian',
		'max_pemakaian',
		'tarif'
	];

	public function layanan()
	{
		return $this->belongsTo(Layanan::class, 'id_layanan');
	}
}
