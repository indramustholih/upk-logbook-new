<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BentukPelatihan;
use App\Models\NamaPelatihan;

class JalurPelatihan extends Model
{
    /**
     * One to Many table bentuk_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bentuks()
    {
        return $this->hasMany(BentukPelatihan::class, 'id', 'id_bentuk');
    }

    /**
     * (belongsTo) One to Many table nama_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function namas()
    {
        return $this->belongsTo(NamaPelatihan::class, 'id_jalur', 'id');
    }
}
