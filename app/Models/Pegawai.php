<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

// use App\Models\GapStandar;
use App\Models\Jabatan;
use App\Models\PerangkatDaerah;

class Pegawai extends Model
{
    use HasUpsertQueries;

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

    // /**
    //  * (belongsTo) One to Many table gap_standars
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function gapStandars()
    // {
    //     return $this->belongsTo(GapStandar::class, 'nip', 'nip');
    // }
}
