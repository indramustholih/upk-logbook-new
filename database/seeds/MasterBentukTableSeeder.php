<?php

use Illuminate\Database\Seeder;

class MasterBentukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statement = "INSERT INTO " .
            "bentuk_pelatihans (`id`, `kode`, `bentuk_pelatihan`, `keterangan`, `created_at`, `updated_at`) " .
            "VALUES " .
            "(1, 'NKL', 'Non Klasikal', 'Pelatihan yang dilakukan melalui kegiatan yang menekankan pada proses pembelajaran praktik kerja dan/atau pembelajaran di luar kelas', '2021-11-09 01:02:42', '2021-11-14 03:42:00')," .
            "(2, 'KL', 'Klasikal', 'Pelatihan yang dilakukan melalui kegiatan yang menekankan pada proses pembelajaran tatap muka di dalam kelas', '2021-11-09 01:02:57', '2021-11-14 03:41:24')";
        DB::unprepared($statement);
    }
}
