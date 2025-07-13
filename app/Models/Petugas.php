<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Petuga
 * 
 * @property int $id
 * @property string $nama_lengkap
 * @property string|null $nomor_induk_petugas
 * @property string|null $nomor_telepon
 * @property string|null $alamat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Petugas extends Model
{
	protected $table = 'petugas';

	protected $fillable = [
		'nama_lengkap',
		'nomor_induk_petugas',
		'nomor_telepon',
		'alamat'
	];

	public function areapetugas(){
		return $this->hasMany(AreaPetugas::class);
	}
}
