<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminMasterDataDosen extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the mahasiswa that owns the AdminMasterDataDosen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(AdminMasterDataMahasiswa::class, 'mahasiswa_id', 'id');
    }

    /**
     * Get the user that owns the AdminMasterDataDosen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

}
