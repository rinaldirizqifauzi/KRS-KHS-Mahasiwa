<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
