<?php

use Illuminate\Database\Seeder;

class OPDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statement = "INSERT INTO " .
            "perangkat_daerahs (kode_opd, nama_opd) " .
            "VALUES " .
            "('1.02.02', 'Rumah Sakit Umum Daerah')," .
            "('1.02.03', 'Rumah Sakit Khusus Ibu dan Anak')," .
            "('1.02.04', 'Rumah Sakit Khusus Gigi dan Mulut')," .
            "('1.01.01', 'Dinas Pendidikan')," .
            "('1.02.01', 'Dinas Kesehatan')," .
            "('1.03.01', 'Dinas Pekerjaan Umum')," .
            "('1.03.02', 'Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang')," .
            "('1.04.01', 'Dinas Perumahan dan Kawasan Permukiman')," .
            "('1.05.01', 'Satuan Polisi Pamong Praja')," .
            "('1.05.02', 'Dinas Kebakaran dan Penanggulangan Bencana')," .
            "('1.06.01', 'Dinas Sosial ')," .
            "('2.01.01', 'Dinas Ketenagakerjaan')," .
            "('2.02.01', 'Dinas Pengendalian Penduduk dan Keluarga Berencana')," .
            "('2.03.01', 'Dinas Ketahanan Pangan dan Pertanian')," .
            "('2.05.01', 'Dinas Lingkungan Hidup dan Kebersihan')," .
            "('2.06.01', 'Dinas Kependudukan dan Pencatatan Sipil')," .
            "('2.08.01', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak')," .
            "('2.09.01', 'Dinas Perhubungan')," .
            "('2.10.01', 'Dinas Komunikasi dan Informatika')," .
            "('2.11.01', 'Dinas Koperasi dan Usaha Kecil dan Menengah')," .
            "('2.12.01', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu')," .
            "('2.13.01', 'Dinas Pemuda dan Olahraga')," .
            "('2.16.01', 'Dinas Kebudayaan dan Pariwisata')," .
            "('2.17.01', 'Dinas Arsip dan Perpustakaan')," .
            "('3.06.01', 'Dinas Perdagangan dan Perindustrian')," .
            "('4.01.01', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan')," .
            "('4.02.01', 'Badan Keuangan dan Aset Daerah')," .
            "('4.02.03', 'Badan Pendapatan Daerah')," .
            "('4.03.01', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia')," .
            "('4.05.02', 'Sekretariat Daerah')," .
            "('4.05.04', 'Sekretariat Dewan Perwakilan Rakyat Daerah')," .
            "('4.05.05', 'Inspektorat Daerah')," .
            "('4.05.06', 'Badan Kesatuan Bangsa dan Politik')," .
            "('4.05.07', 'Kecamatan Sukasari')," .
            "('4.05.08', 'Kecamatan Cidadap')," .
            "('4.05.09', 'Kecamatan Sukajadi')," .
            "('4.05.10', 'Kecamatan Cicendo')," .
            "('4.05.11', 'Kecamatan Andir')," .
            "('4.05.12', 'Kecamatan Coblong')," .
            "('4.05.13', 'Kecamatan Bandung Wetan')," .
            "('4.05.14', 'Kecamatan Sumur Bandung')," .
            "('4.05.15', 'Kecamatan Cibeunying Kidul')," .
            "('4.05.16', 'Kecamatan Cibeunying Kaler')," .
            "('4.05.17', 'Kecamatan Astana Anyar')," .
            "('4.05.18', 'Kecamatan Bojongloa Kaler')," .
            "('4.05.19', 'Kecamatan Bojongloa Kidul')," .
            "('4.05.20', 'Kecamatan Babakan Ciparay')," .
            "('4.05.21', 'Kecamatan Bandung Kulon')," .
            "('4.05.22', 'Kecamatan Regol')," .
            "('4.05.23', 'Kecamatan Lengkong')," .
            "('4.05.24', 'Kecamatan Batununggal')," .
            "('4.05.25', 'Kecamatan Ujungberung')," .
            "('4.05.26', 'Kecamatan Kiaracondong')," .
            "('4.05.27', 'Kecamatan Arcamanik')," .
            "('4.05.28', 'Kecamatan Cibiru')," .
            "('4.05.29', 'Kecamatan Antapani')," .
            "('4.05.30', 'Kecamatan Rancasari')," .
            "('4.05.31', 'Kecamatan Buahbatu')," .
            "('4.05.32', 'Kecamatan Bandung Kidul')," .
            "('4.05.33', 'Kecamatan Gedebage')," .
            "('4.05.34', 'Kecamatan Panyileukan')," .
            "('4.05.35', 'Kecamatan Cinambo')," .
            "('4.05.36', 'Kecamatan Mandalajati')";
        DB::unprepared($statement);
    }
}
