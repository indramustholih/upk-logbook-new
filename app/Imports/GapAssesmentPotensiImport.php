<?php

namespace App\Imports;

use App\Models\GapAssesmentPotensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GapAssesmentPotensiImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new GapAssesmentPotensi([
            'nip'                => isset($row[0]) ? $row[0] : '' ,
            'nama'               => isset($row[1]) ? $row[1] : '', 
            'jabatan'            => isset($row[2]) ? $row[2] : '' , 
            'perangkat_daerah'   => isset($row[3]) ? $row[3] : '' , 
            'kemampuan_berpikir_kritis'     => isset($row[4]) ? $row[4] : '' , 
            'kemampuan_berpikir_konseptual' => isset($row[5]) ? $row[5] : '', 
            'kemampuan_berpikir_analitis'   => isset($row[6]) ? $row[6] : '',
            'sistematika'       => isset($row[7]) ? $row[7] : '', 
            'ketelitian'        => isset($row[8]) ? $row[8] : '', 
            'pengambilan_keputusan' => isset($row[9]) ? $row[9] : '', 
            'motivasi'          => isset($row[10]) ? $row[10] : '', 
            'kepatuhan_aturan'  => isset($row[11]) ? $row[11] : '', 
            'komitmen'          => isset($row[12]) ? $row[12] : '', 
            'daya_tahan_kerja'  => isset($row[13]) ? $row[13] : '',
            'asertiv'           => isset($row[14]) ? $row[14] : '', 
            'adaptasi'          => isset($row[15]) ? $row[15] : '', 
            'kemampuan_mengarahkan' => isset($row[16]) ? $row[16] : '', 
            'relasi_sosial'         => isset($row[17]) ? $row[17] : '', 
            'kemampuan_kerjasama'   => isset($row[18]) ? $row[18] : '', 
            'deskripsi_potensi'     => isset($row[19]) ? $row[19] : '', 
            // 'tanggal_assesment'     => isset($row[20]) ? $row[20] : null
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}