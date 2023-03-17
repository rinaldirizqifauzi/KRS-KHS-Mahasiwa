<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\ModelStatus\HasStatuses;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasStatuses;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'akses',
        'nohp',
        'nohp_verified_at',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(AdminMasterDataMahasiswa::class, 'mahasiswa_id', 'id');
    }

    protected static function booted()
    {
        // sesudah data dibuat
        Static::created(function($user){
            $user->setStatus('aktif');
        });
    }
}
