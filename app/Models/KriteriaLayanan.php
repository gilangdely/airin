<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KriteriaLayanan
 * 
 * @property int $id_kriteria_layanan
 * @property int $id_layanan
 * @property string $kriteria
 * @property bool $status_aktif
 * 
 * @property Layanan $layanan
 *
 * @package App\Models
 */
class KriteriaLayanan extends Model
{
	protected $table = 'kriteria_layanan';
	protected $primaryKey = 'id_kriteria_layanan';
	public $timestamps = false;

	protected $casts = [
		'id_layanan' => 'int'
	];

	protected $fillable = [
		'id_layanan',
		'kriteria'
	];

	public function layanan()
	{
		return $this->belongsTo(Layanan::class, 'id_layanan');
	}
}
