<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelanggan
 * 
 * @property string $id_pelanggan
 * @property string $nama_pelanggan
 * @property string $no_ktp
 * @property string $alamat
 * @property string $no_hp
 * @property bool $status
 *
 * @package App\Models
 */
class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'status' => 'bool'
    ];

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'no_ktp',
        'alamat',
        'no_hp',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_pelanggan = self::generateId();
        });
    }

    public static function generateId()
    {
        $latest = DB::table('pelanggan')->lockForUpdate()->latest('id_pelanggan')->first();
        if (!$latest) {
            return 'PLG0001';
        }

        $lastId = $latest->id_pelanggan; // Contoh: "PLG0009"
        $number = intval(substr($lastId, 3)) + 1;
        return 'PLG' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function meterans()
    {
        return $this->hasMany(Meteran::class, 'id_pelanggan');
    }
}
