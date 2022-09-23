<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

use App\Models\Pegawai;
use App\Models\StandarPelatihan;
use App\Models\UsulanPelatihan;

class Jabatan extends Model
{
    use HasUpsertQueries;

    /**
     * (belongsTo) One to Many table standar_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function standars()
    {
        return $this->belongsTo(StandarPelatihan::class, 'kode_jabatan', 'kode_jabatan');
    }

    /**
     * (belongsTo) One to Many table usulan_pelatihans
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usulans()
    {
        return $this->belongsTo(UsulanPelatihan::class, 'kode_jabatan', 'kode_jabatan');
    }

    /**
     * (belongsTo) One to Many table pegawais
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'kode_jabatan', 'kode_jabatan');
    }
}
