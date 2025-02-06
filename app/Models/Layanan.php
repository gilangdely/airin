<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Layanan
 * 
 * @property int $id_layanan
 * @property string $nama_layanan
 * 
 * @property Collection|KriteriaLayanan[] $kriteria_layanans
 *
 * @package App\Models
 */
class Layanan extends Model
{
	protected $table = 'layanan';
	protected $primaryKey = 'id_layanan';
	public $timestamps = false;

	protected $fillable = [
		'nama_layanan'
	];

	public function kriteria_layanans()
	{
		return $this->hasMany(KriteriaLayanan::class, 'id_layanan');
	}
}
