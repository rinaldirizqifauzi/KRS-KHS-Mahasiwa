<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdminMasterDataMahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get all of the children for the Biaya
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenProdi(): HasMany
    {
        return $this->hasMany(AdminMasterDataProdi::class, 'prodi_id');
    }

    /**
     * Get the Prodi that owns the AdminMasterDataProdi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prodi(): BelongsTo
    {
        return $this->belongsTo(AdminMasterDataProdi::class, 'prodi_id');
    }


    /**
     * Get the user that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the krs for the AdminMasterDataMahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function krs(): HasMany
    {
        return $this->hasMany(AdminMasterDataKRS::class);
    }

}
