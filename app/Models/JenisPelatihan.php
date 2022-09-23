<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\NamaPelatihan;

class JenisPelatihan extends Model
{
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
