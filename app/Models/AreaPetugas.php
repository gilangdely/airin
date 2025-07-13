<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AreaPetuga
 * 
 * @property int $id
 * @property string $nama_area
 * @property int $id_petugas
 * @property string $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AreaPetugas extends Model
{
	protected $table = 'area_petugas';

	protected $casts = [
		'id_petugas' => 'int'
	];

	protected $fillable = [
		'nama_area',
		'id_petugas',
		'keterangan'
	];

	public function petugas(){
		return $this->belongsTo(Petugas::class, 'id_petugas','id');
	}
}
