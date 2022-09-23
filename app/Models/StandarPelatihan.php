<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\GapStandar;
use App\Models\Jabatan;
use App\Models\NamaPelatihan;
use App\Models\PerangkatDaerah;

class StandarPelatihan extends Model
{
    /**
     * One to Many table namas_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function namas()
    {
        return $this->hasMany(NamaPelatihan::class, 'id', 'id_nama');
    }

    /**
     * One to Many table jabatans
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'kode_jabatan', 'kode_jabatan');
    }

    /**
     * One to Many table perangkat_daerahs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opd()
    {
        return $this->hasMany(PerangkatDaerah::class, 'kode_opd', 'kode_opd');
    }

    /**
     * (belongsTo) One to Many table gap_standars
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gapStandars()
    {
        return $this->belongsTo(GapStandar::class, 'id_standar', 'id');
    }
}
