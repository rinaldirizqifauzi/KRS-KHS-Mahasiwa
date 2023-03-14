<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminMasterDataKRS extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the mahasiswa that owns the AdminMasterDataKRS
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(AdminMasterDataMahasiswa::class, 'mahasiswa_id');
    }


}
