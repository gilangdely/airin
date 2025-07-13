<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $username
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasRoles, HasApiTokens;

    protected $table = 'users';

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'users_picture'
    ];

    public function getAvatarUrlAttribute()
    {
        if ($this->users_picture) {
            return Storage::url('public/profile-pictures/' . $this->users_picture);
        }
        return "https://ui-avatars.com/api/?background=random&name=" . urlencode($this->name);
    }

    
}
