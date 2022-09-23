<?php

use Illuminate\Database\Seeder;

class MasterNamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statement = "INSERT INTO " .
            "nama_pelatihans (`id`, `id_jenis`, `id_jalur`, `kode`, `nama_pelatihan`, `keterangan`, `created_at`, `updated_at`) " .
            "VALUES " .
            "(1, 1, 3, 'T001', 'Pelatihan Pelayanan Publik Berbasis Elektronik', 'Pelatihan Pelayanan Publik Berbasis Elektronik', '2021-11-14 03:43:52', '2021-11-14 03:43:52'), " .
            "(2, 1, 3, 'T0002', 'Pelatihan Manajemen Strategi Pengembangan Inovasi Daerah', 'Pelatihan Manajemen Strategi Pengembangan Inovasi Daerah', '2021-11-14 03:44:33', '2021-11-14 03:44:33'), " .
            "(3, 1, 3, 'T0003', 'Pelatihan Laporan Kinerja', 'Pelatihan Laporan Kinerja', '2021-11-14 03:45:28', '2021-11-14 03:45:28'), " .
            "(4, 1, 3, 'T005', 'Pelatihan Penyusunan Dokumen Rencana Pembangunan Jangka Menengah Daerah (Rpjmd)', 'Pelatihan Penyusunan Dokumen Rencana Pembangunan Jangka Menengah Daerah (Rpjmd)', '2021-11-14 03:46:58', '2021-11-14 03:46:58'), " .
            "(5, 1, 10, 'BT_00001', 'Bimbingan Teknis Pengelolaan Pusat Data', 'Bimbingan Teknis Pengelolaan Pusat Data', '2021-11-15 01:13:02', '2021-11-15 01:13:02'), " .
            "(6, 1, 2, 'PM_00001', 'Pelatihan PIM IV', 'Pelatihan PIM IV', '2021-11-15 01:15:11', '2021-11-15 01:15:11') ";

        DB::unprepared($statement);
    }
}
