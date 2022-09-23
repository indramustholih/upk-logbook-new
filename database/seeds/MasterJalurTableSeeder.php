<?php

use Illuminate\Database\Seeder;

class MasterJalurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statement = "INSERT INTO " .
            "jalur_pelatihans ( `id`, `id_bentuk`, `kode`, `jalur_pelatihan`, `keterangan`, `created_at`, `updated_at`) " .
            "VALUES " .
            "(1, 2, 'KL01', 'Pelatihan Struktural Kepemimpinan', 'Program peningkatan pengetahuan, keterampilan, dan sikap perilaku PNS untuk memenuhi Kompetensi kepemimpinan melalui proses pembelajaran secara intensif', '2021-11-09 01:03:38', '2021-11-11 17:48:05'), " .
            "(2, 2, 'KL02', 'Pelatihan Manajerial', 'Program peningkatan pengetahuan peningkatan pengetahuan, keterampilan dan sikap perilaku PNS untuk memenuhi Kompetensi teknis manajerial bidang kerja melalui proses pembelajaran secara intensif', '2021-11-11 17:11:26', '2021-11-11 17:48:28'), " .
            "(3, 2, 'KL03', 'Pelatihan Teknis', 'Program peningkatan pengetahuan, ketrampilan, dan sikap perilaku PNS untuk memenuhi Kompetensi penguasaan substantif bidang kerja melalui proses pembelajaran intensif', '2021-11-11 17:12:06', '2021-11-11 17:49:08'), " .
            "(4, 2, 'KL04', 'Pelatihan Fungsional', 'Program peningkatan pengetahuan, ketrampilan, dan sikap perilaku PNS untuk memenuhi Kompetensi bidang tugas yang terkait dengan JF melalui proses pembelajaran secara intensif', '2021-11-11 17:13:05', '2021-11-11 17:49:34'), " .
            "(5, 2, 'KL05', 'Pelatihan Sosial Kultural', 'Program peningkatan pengetahuan, ketrampilan, dan sikap perilaku PNS untuk memenuhi Kompetensi Sosial Kultural melalui proses pembelajaran secara intensif', '2021-11-11 17:13:46', '2021-11-11 17:50:00'), " .
            "(6, 2, 'KL06', 'Seminar/Konferensi/Sarasehan', 'Pertemuan ilmiah untuk meningkatkan Kompetensi terkait peningkatan kinerja dan karier yang diberikan oleh pakar/praktisi untuk memperoleh pendapat para ahli', '2021-11-11 17:14:32', '2021-11-11 17:50:27'), " .
            "(7, 2, 'KL07', 'Workshop atau Lokakarya', 'Pertemuan ilmiah untuk meningkatkan Kompetensi terkait peningkatan kinerja dan karier yang diberikan oleh pakar/praktisi.', '2021-11-11 17:16:14', '2021-11-11 17:54:01'), " .
            "(8, 2, 'KL08', 'Kursus', 'Kegiatan pembelajaran terkait suatu pengetahuan atau ketrampilan dalam waktu yang relatif singkat, dan biasanya diberikan oleh lembaga nonformal', '2021-11-11 17:16:56', '2021-11-11 17:54:33'), " .
            "(9, 2, 'KL09', 'Penataran', 'Kegiatan pembelajaran untuk meningkatkan pengetahuan dan karakter PNS dalam bidang tertentu dalam rangka peningkatan kinerja organisasi', '2021-11-11 17:17:41', '2021-11-11 17:55:23'), " .
            "(10, 2, 'KL10', 'Bimbingan Teknis', 'Pembelajaran dalam rangka memberikan bantuan untuk menyelesaikan persoalan/masalah yang bersifat khusus dan teknis', '2021-11-11 17:18:18', '2021-11-11 17:56:08'), " .
            "(11, 2, 'KL11', 'Sosialisasi', 'Kegiatan ilmiah untuk memasyarakatkan sesuatu pengetahuan dan/atau kebijakan agar menjadi lebih dikenal, dipahami, dihayati oleh PNS', '2021-11-11 17:18:56', '2021-11-11 17:56:50'), " .
            "(12, 2, 'KL12', 'Jalur klasikal Lainnya', 'Jalur Pengembangan Kompetensi dalam bentuk\r\npelatihan klasikal lainnya', '2021-11-11 17:19:48', '2021-11-11 17:19:48'), " .
            "(13, 1, 'NKL01', 'Coaching', 'Pembimbingan peningkatan kinerja melaui pembekalan kemampuan memecahkan permasalahan dengan mengoptimalkan potensi diri', '2021-11-11 17:20:23', '2021-11-11 17:58:22'), " .
            "(14, 1, 'NKL02', 'Mentoring', 'Pembimbingan peningkatan kinerja melalui transfer pengetahuan, pengalaman dan keterampilan dari orang yang lebih berpengalaman pada bidang yang sama', '2021-11-11 17:20:52', '2021-11-11 17:58:40'), " .
            "(15, 1, 'NKL03', 'E-learning', 'Pengembangan Kompetensi PNS yang dilaksanakan dalam bentuk pelatihan dengan mengoptimalkan penggunaan teknologi informasi dan komunikasi untuk mencapai tujuan pembelajaran dan peningkatan kinerja', '2021-11-11 17:21:20', '2021-11-11 17:59:01'), " .
            "(16, 1, 'NKL04', 'Pelatihan Jarak Jauh', 'Proses pembelajran secara terstruktur dengan dipandu oleh penyelenggara pelatihan secara jarak jauh', '2021-11-11 17:22:01', '2021-11-11 17:59:27'), " .
            "(17, 1, 'NKL05', 'Detasering (Secondment)', 'Penugasan/ penempatan PNS pada suatu tempat untuk jangka waktu tertentu', '2021-11-11 17:22:42', '2021-11-11 18:00:15'), " .
            "(18, 1, 'NKL06', 'Pembelajaran Alam Terbuka (Outbond)', 'Pembelajaran melalui simulasi di alam terbuka', '2021-11-11 17:23:12', '2021-11-11 18:00:49'), " .
            "(19, 1, 'NKL07', 'Patok Banding (Benchmarking)', 'Kegiatan untuk me- ngembangkan Kompetensi dengan cara membandingkan dan mengukur suatu kegiatan organisasi lain yang mempunyai karakteristik sejenis', '2021-11-11 17:23:48', '2021-11-11 18:01:24'), " .
            "(20, 1, 'NKL08', 'Pertukaran antara PNS dengan pegawai swasta/badan usaha milik negara/ badan usaha milik daerah', 'Kesempatan kepada PNS untuk menduduki jabatan tertentu di sektor swasta sesuai dengan persyaratan kompetensi', '2021-11-11 17:42:02', '2021-11-11 18:01:52'), " .
            "(21, 1, 'NKL09', 'Belajar Mandiri (Self Development)', 'Upaya individu PNS untuk mengembangkan kompetensinya melalui proses secara mandiri dengan memanfaatkan sumber pembelajaraan yang tersedia', '2021-11-11 17:42:48', '2021-11-11 18:02:22'), " .
            "(22, 1, 'NKL10', 'Komunitas Belajar (Community of Practices)', 'Komunitas belajar adalah suatu perkumpulan beberapa orang PNS yang memiliki tujuan saling menguntungkan untuk berbagi pengetahuan, keterampilan, dan sikap perilaku PNS sehingga mendorong terjadinya proses pembelajaran', '2021-11-11 17:43:52', '2021-11-11 18:02:49'), " .
            "(23, 1, 'NKL11', 'Bimbingan di tempat kerja', 'Bimbingan di tempat kerja', '2021-11-11 17:44:21', '2021-11-11 17:44:21'), " .
            "(24, 1, 'NKL12', 'Magang/praktik kerja', 'Proses pembelajaran untuk memperoleh dan menguasai keterampilan dengan melibatkan diri dalam proses pekerjaan tanpa atau dengan petunjuk orang yang sudah terampil dalam pekerjaan itu (learning by doing)', '2021-11-11 17:44:59', '2021-11-11 18:03:21'), " .
            "(25, 1, 'NKL13', 'Jalur Pengembangan Kompetensi dalam bentuk pelatihan nonklasikal lainnya', 'Jalur Pengembangan Kompetensi dalam bentuk pelatihan nonklasikal lainnya', '2021-11-11 17:45:44', '2021-11-11 17:45:44') ";

        DB::unprepared($statement);
    }
}
