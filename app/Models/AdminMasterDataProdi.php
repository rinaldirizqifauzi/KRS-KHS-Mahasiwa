<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdminMasterDataProdi extends Model
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
     * Get all of the mahasiswa for the AdminMasterDataProdi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(AdminMasterDataMahasiswa::class, 'prodi_id');
    }
}