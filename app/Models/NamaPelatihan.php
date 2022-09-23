<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\JenisPelatihan;
use App\Models\JalurPelatihan;
use App\Models\StandarPelatihan;
use App\Models\UsulanPelatihan;

class NamaPelatihan extends Model
{
    /**
     * One to Many table jenis_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jenis()
    {
        return $this->hasMany(JenisPelatihan::class, 'id', 'id_jenis');
    }

    /**
     * One to Many table jalur_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jalurs()
    {
        return $this->hasMany(JalurPelatihan::class, 'id', 'id_jalur');
    }

    /**
     * (belongsTo) One to Many table standar_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function standars()
    {
        return $this->belongsTo(StandarPelatihan::class, 'id_nama', 'id');
    }

    /**
     * (belongsTo) One to Many table usulan_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usulans()
    {
        return $this->belongsTo(UsulanPelatihan::class, 'id_nama', 'id');
    }
}
