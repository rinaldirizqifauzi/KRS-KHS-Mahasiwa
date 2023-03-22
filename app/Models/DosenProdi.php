<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DosenProdi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'dosen_prodis';

    /**
     * Get the prodi that owns the DosenProdi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prodi(): BelongsTo
    {
        return $this->belongsTo(AdminMasterDataProdi::class);
    }

    /**
     * Get the dosen that owns the AdminMasterDataProdi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dosen(): BelongsTo
    {
        return $this->BelongsTo(AdminMasterDataDosen::class, 'prodi_id', 'id');
    }
}
