<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bulan
 * 
 * @property string $id_bulan
 * @property string $nama_bulan
 * 
 * @property Collection|Tagihan[] $tagihans
 *
 * @package App\Models
 */
class Bulan extends Model
{
	protected $table = 'bulan';
	protected $primaryKey = 'id_bulan';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nama_bulan'
	];

	public function tagihans()
	{
		return $this->hasMany(Tagihan::class, 'id_bulan');
	}

	public function pemakaian(){
		return $this->hasMany(Pemakaian::class, 'bulan', 'id_bulan');
	}
}
