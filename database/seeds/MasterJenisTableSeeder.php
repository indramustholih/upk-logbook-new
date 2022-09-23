<?php

use Illuminate\Database\Seeder;

class MasterJenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statement = "INSERT INTO " .
            "jenis_pelatihans (`id`, `kode`, `jenis_pelatihan`, `keterangan`, `created_at`, `updated_at`) " .
            "VALUES " .
            "(1, 'T01', 'Pelatihan', 'Pelatihan', '2021-11-09 19:15:48', '2021-11-13 22:10:53')," .
            "(5, 'P02', 'Pendidikan', 'Pengembangan kompetensi yang dilakukan dengan pemberian tugas belajar pada pendidikan formal dalam jenjang pendidikan tinggi sesuai dengan ketentuan peraturan perundang-\r\nundangan', '2021-11-09 19:16:12', '2021-11-14 03:40:23')";
        DB::unprepared($statement);
    }
}
