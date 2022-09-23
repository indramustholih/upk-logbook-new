-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2022 pada 10.47
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1776504_upk_logbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_kerjas`
--

CREATE TABLE `jabatan_kerjas` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan_kerjas`
--

INSERT INTO `jabatan_kerjas` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Unit Pelayanan Kesehatan', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(2, 'Koordinator Penunjang Medik', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(3, 'Kepala Subbag Administrasi Umum', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(4, 'Koordinator Pelayanan Medik dan Keperawatan', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(5, 'Dokter Utama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(6, 'Dokter Gigi Utama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(7, 'Dokter Madya', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(8, 'Dokter Gigi Madya', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(9, 'Dokter Gigi Muda', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(10, 'Perawat Penyelia', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(11, 'Perawat Gigi Penyelia', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(12, 'Pranata Laboratorium Kesehatan Mahir', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(13, 'Radiografer Mahir', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(14, 'Apoteker Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(15, 'Analis Kepegawaian Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(16, 'Fisioterapis Mahir', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(17, 'Bendahara Pengeluaran', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(18, 'Perekam Medis Mahir', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(19, 'Perawat Mahir', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(20, 'Analis Pengelolaan Keuangan APBN Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(21, 'Administrator Kesehatan Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(22, 'Pranata Laboratorium Kesehatan Pelaksana', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(23, 'Pranata Laboratorium Kesehatan Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(24, 'Perawat Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(25, 'Radiografer Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(26, 'Perawat Gigi Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(27, 'Perekam Medis Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(28, 'Nutrisionis Terampil', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(29, 'Dokter Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(30, 'Pranata Komputer Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(31, 'Perencana Pertama', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(32, 'Staf TU Administrasi', '2022-09-22 08:04:53', '2022-09-22 18:38:29'),
(33, 'Pengemudi', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(34, 'Bidan', '2022-09-22 08:04:53', '2022-09-22 08:04:56'),
(36, 'Dokter Muda', '2022-09-22 08:04:53', '2022-09-22 08:04:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_jabatans`
--

CREATE TABLE `kegiatan_jabatans` (
  `id` int(11) NOT NULL,
  `id_jabatan_kerja` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `angka_kredit` float(10,5) NOT NULL,
  `output` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `mutu` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `biaya` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan_jabatans`
--

INSERT INTO `kegiatan_jabatans` (`id`, `id_jabatan_kerja`, `nama_kegiatan`, `angka_kredit`, `output`, `satuan`, `mutu`, `waktu`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 15, 'Mengumpulkan kelengkapan berkas usul penetapan Kartu Isteri/Kartu Suami', 0.03000, 10, 'berkas', 100, 12, 0, '2022-08-01 01:47:42', '2022-08-01 01:47:42'),
(2, 15, 'Mengentri data usul kenaikan pangkat kedalam SAPK', 0.00800, 10, 'Data', 100, 12, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(3, 15, 'Mengentri dokumen surat keputusan kenaikan ke dalam SAPK untuk peremajaan data', 0.02000, 5, 'Laporan', 100, 12, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(4, 2, 'Melakukan implementasi rancangan integrasi data', 0.05500, 1, 'Layanan', 100, 10, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(5, 10, 'Implementasi keperawatan Melakukan intervensi keperawatan (acute & chroniccare ) dalam rangka pemenuhan kebutuhan dasar manusia Pemenuhan kebutuhan pengaturan suhu tubuh Memfasilitasi lingkungan dengan suhu yang sesuai dengan kebutuhan (0.43/Pertindakan)', 0.43000, 30, 'Tindakan', 100, 12, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(6, 10, 'Implementasi keperawatan Melakukan intervensi keperawatan (acute & chroniccare )\r\ndalam rangka pemenuhan kebutuhan dasar manusia Tindakan keperawatan yang berkaitan\r\ndengan komunikasi Melakukan komunikasi terapeutik dalam pemberian asuhan keperawatan\r\n(0.05/Pertindakan)', 0.05000, 30, 'Tindakan', 100, 12, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(10, 10, 'Implementasi keperawatan Melakukan intervensi keperawatan (acute & chroniccare )\r\ndalam rangka pemenuhan kebutuhan dasar manusia Tindakan keperawatan yang berkaitan\r\ndengan rekreasi Memfasilitasi suasana lingkungan yang tenang dan aman\r\n(0.24/Pertindakan)', 0.24000, 30, 'Tindakan', 100, 12, 0, '2022-08-01 01:47:43', '2022-08-01 01:47:43'),
(15, 10, 'Implementasi keperawatan Melakukan intervensi keperawatan (acute & chroniccare )\r\ndalam rangka pemenuhan kebutuhan dasar manusia Melakukan implementasi keperawatan\r\nyang khusus Melakukan tindakan keperawatan spesifik terkait kasus dan kondisi pasien\r\nManajemen nyeri pada setiap kondisi (0.18/Pertindakan)', 0.18000, 30, 'Tindakan', 100, 12, 0, '2022-08-01 01:47:44', '2022-08-01 01:47:44'),
(16, 10, 'Melakukan dokumentasi proses keperawatan pada tahap Diagnosis keperawatan (0.12/Per\r\npasien)', 0.12000, 50, 'Pasien', 100, 12, 0, '2022-08-01 01:47:44', '2022-08-01 01:47:44'),
(17, 10, 'Melakukan dokumentasi proses keperawatan pada tahap Terampilan tindakan keperawatan\r\n(0.12/Per pasien)', 0.12000, 30, 'Pasien', 100, 12, 0, '2022-08-01 01:47:44', '2022-08-01 01:47:44'),
(18, 10, 'Melakukan perencanaan pelayanan keperawatan Menyusun rencana kegiatan individu\r\nperawat (0.24/Per dokumen harian)', 0.24000, 50, 'Dokumen', 100, 12, 0, '2022-08-01 01:47:44', '2022-08-01 01:47:44'),
(19, 10, 'Melaksanakan kegiatan bantuan/partisipasi kesehatan (0.5/Per kali)', 0.50000, 50, 'Kali', 100, 12, 0, '2022-08-01 01:47:44', '2022-08-01 01:47:44'),
(20, 10, 'Melaksanakan tugas lapangan di bidang kesehatan Melaksanakan penanggulangan\r\npenyakit/wabah tertentu (0.25/Per kali)', 0.25000, 20, 'Kali', 100, 12, 0, '2022-08-01 01:47:46', '2022-08-01 01:47:46'),
(21, 10, 'Mengikuti seminar/lokakarya internasional/nasional sebagai Peserta (1/Kali)', 1.00000, 10, 'Kali', 100, 12, 0, '2022-08-01 01:47:45', '2022-08-01 01:47:45'),
(22, 30, 'Melakukan implementasi rancangan intgrasi data (0.055/Layanan Integrasi data)', 0.05500, 1, 'Layanan', 100, 12, 0, '2022-08-01 01:47:45', '2022-08-01 01:47:45'),
(23, 30, 'Membuat aplikasi di UPK Kemenkes', 1.00000, 1, 'Kali', 100, 12, 0, '2022-08-01 01:47:45', '2022-08-01 01:47:45'),
(25, 14, 'Mengumpulkan data maupun literatur kefarmasian', 0.06000, 1, 'Laporan', 100, 12, 0, '2022-09-23 07:29:08', '2022-09-23 00:29:08'),
(26, 14, 'Menyusun draft surat permintaan obat', 0.00000, 12, 'Laporan', 100, 12, 0, '2022-09-12 00:20:45', '2022-09-12 00:20:45'),
(27, 14, 'Melakukan penyimpanan perbekalan farmasi', 0.00000, 12, 'Kegiatan', 100, 12, 0, '2022-09-12 07:22:12', '2022-09-12 07:22:12'),
(28, 14, 'Menyusun draft berita acara pemusnahan sediaan farmasi, alat kesehatan dan perbekalan farmasi', 0.00000, 1, 'Laporan', 100, 12, 0, '2022-09-12 00:22:42', '2022-09-12 00:22:42'),
(29, 14, 'Memeriksa dan menilai resep', 0.00000, 5000, 'Pasien', 100, 12, 0, '2022-09-12 00:23:00', '2022-09-12 00:23:00'),
(30, 14, 'Meracik obat', 0.00000, 5000, 'Pasien', 100, 12, 0, '2022-09-12 00:24:12', '2022-09-12 00:24:12'),
(31, 14, 'Menyerahkan obat kepada pasien disertai dengan penjelasan penggunaan obat', 0.00000, 5000, 'Pasien', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(32, 14, 'Memberikan pelayanan informasi obat', 0.00000, 5000, 'Pasien', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(33, 14, 'Melakukan konsultasi dengan dokter, perawat, dan tenaga kesehatan lainnya', 0.00000, 150, 'Kegiatan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(34, 14, 'Menyusun draft berita acara pemusnahan resep', 0.00000, 1, 'Laporan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(35, 14, 'Menyusun laporan pelaksanaan tugas', 0.00000, 1, 'Laporan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(36, 14, 'Melaksanakan tugas kedinasan lain', 0.00000, 6, 'Laporan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(37, 14, 'Mengikuti seminar/lokakarya sebagai peserta', 0.00000, 1, 'Laporan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(38, 14, 'menjadi anggota profesi', 0.00000, 1, 'Laporan', 100, 12, 0, '2022-09-12 07:27:32', '2022-09-12 07:27:32'),
(39, 14, 'Membuat Surat Pesanan Dalam Rangka Pengadaan Sediaan farmasi', 0.00750, 0, 'Laporan', 100, 12, 0, '2022-09-12 01:25:04', '2022-09-12 01:25:04'),
(40, 14, 'Melakukan Verifikasi Berita Acara Penerimaan Sediaan Farmasi', 0.00750, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:31:24', '2022-09-12 01:31:24'),
(41, 14, 'Melakukan Penatalksanaan Penyimpanan Sidiaan Farmasi', 0.02000, 0, 'Kegiatan', 100, 12, 0, '2022-09-12 01:37:21', '2022-09-12 01:37:21'),
(42, 7, 'Melakukan pelayanan spesiakia konsultan', 12.36000, 1000, 'Pasien', 100, 12, 0, '2022-09-12 01:38:09', '2022-09-12 01:38:09'),
(43, 14, 'Mengesahkan Berita Acara Penerimaan Sediaan Farmasi', 0.00500, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:40:42', '2022-09-12 01:40:42'),
(44, 14, 'Melakukan Stock Opname', 0.02000, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:41:54', '2022-09-12 01:41:54'),
(45, 14, 'Mengkaji Hasil Stock Opname', 0.02000, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:43:12', '2022-09-12 01:43:12'),
(46, 14, 'Mengkaji Permintaan Sediaan Farmasi', 0.00170, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:44:31', '2022-09-12 01:44:31'),
(47, 14, 'Melaksanakan Pendistribusian Sediaan farmasi', 0.00500, 0, 'Kegiatan', 100, 12, 0, '2022-09-12 01:45:50', '2022-09-12 01:45:50'),
(48, 14, 'Memverivikasi dan Mengesahkan Proses Pendistribusian', 0.00800, 0, 'Dokumen', 100, 12, 0, '2022-09-12 01:47:00', '2022-09-12 01:47:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_jabatan_tambahans`
--

CREATE TABLE `kegiatan_jabatan_tambahans` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `angka_kredit` float(10,5) NOT NULL DEFAULT 0.00000,
  `output` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `mutu` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `biaya` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan_jabatan_tambahans`
--

INSERT INTO `kegiatan_jabatan_tambahans` (`id`, `nama_kegiatan`, `angka_kredit`, `output`, `satuan`, `mutu`, `waktu`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'Swab PCR atau Antigen', 0.01000, 10, 'Kali', 100, 12, 0, '2022-09-23 07:58:16', '2022-09-23 00:58:16'),
(25, 'Input Persediaan Barang', 0.02000, 5, 'Kali', 100, 12, 0, '2022-09-23 07:57:32', '2022-09-23 00:57:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kegiatans`
--

CREATE TABLE `log_kegiatans` (
  `id_log_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `id_master_kegiatan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_kegiatans`
--

INSERT INTO `log_kegiatans` (`id_log_kegiatan`, `id_user`, `tanggal_kegiatan`, `id_master_kegiatan`, `jumlah`, `updated_at`, `created_at`, `keterangan`) VALUES
(19, 22, '2022-07-01', 24, 1, '2022-07-12 09:29:16', '2022-07-12 09:29:16', 'ikutan seminar'),
(20, 22, '2022-07-14', 19, 3, '2022-07-12 10:24:26', '2022-07-12 10:24:26', '3 pasien hari ini'),
(21, 3, '2022-07-13', 32, 2, '2022-07-12 23:27:20', '2022-07-12 23:27:20', '-'),
(22, 3, '2022-07-13', 33, 1, '2022-07-13 00:13:29', '2022-07-13 00:13:29', 'Membuat aplikasi logbook'),
(23, 3, '2022-07-13', 34, 3, '2022-07-13 00:30:14', '2022-07-13 00:30:14', '-'),
(24, 3, '2022-09-20', 32, 2022, '2022-09-07 21:32:30', '2022-09-07 21:32:30', '123'),
(25, 29, '2022-09-15', 37, 1, '2022-09-11 20:56:08', '2022-09-11 20:56:08', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kegiatan_tambahans`
--

CREATE TABLE `log_kegiatan_tambahans` (
  `id_log_kegiatan_tambahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `id_master_kegiatan_tambahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_kegiatan_tambahans`
--

INSERT INTO `log_kegiatan_tambahans` (`id_log_kegiatan_tambahan`, `id_user`, `tanggal_kegiatan`, `id_master_kegiatan_tambahan`, `jumlah`, `updated_at`, `created_at`, `keterangan`) VALUES
(25, 3, '2022-09-09', 35, 1, '2022-09-07 21:48:37', '2022-09-07 21:48:37', '-'),
(26, 29, '2022-09-01', 42, 1, '2022-09-11 23:59:05', '2022-09-11 23:59:05', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kegiatans`
--

CREATE TABLE `master_kegiatans` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kegiatan_jabatan` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `angka_kredit` float(10,5) DEFAULT NULL,
  `output` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `mutu` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kegiatan_tambahans`
--

CREATE TABLE `master_kegiatan_tambahans` (
  `id_master_kegiatan_tambahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kegiatan_jabatan_tambahan` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `angka_kredit` float(10,5) DEFAULT NULL,
  `output` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `mutu` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_kegiatan_tambahans`
--

INSERT INTO `master_kegiatan_tambahans` (`id_master_kegiatan_tambahan`, `id_user`, `tahun`, `id_kegiatan_jabatan_tambahan`, `nama_kegiatan`, `angka_kredit`, `output`, `satuan`, `mutu`, `waktu`, `biaya`, `created_at`, `updated_at`) VALUES
(35, 3, 2022, 25, 'Input Persediaan Barang', 0.02000, 12, 'Laporan', 100, 12, 0, '2022-09-07 21:03:15', '2022-09-07 21:03:15'),
(36, 3, 2022, 1, 'Swab PCR atau Antigen', 0.01000, 5, 'Kali', 100, 12, 0, '2022-09-07 21:32:00', '2022-09-07 21:32:00'),
(42, 29, 2022, 1, 'Swab PCR atau Antigen', 0.01000, 5, 'Kali', 100, 12, 0, '2022-09-11 23:53:10', '2022-09-11 23:53:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahuns`
--

CREATE TABLE `tahuns` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `level`, `remember_token`, `nip`, `created_at`, `updated_at`, `id_jabatan`, `unit_kerja`, `pangkat`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$qHSGdrHTOKuLtwyt5/Sn4uvpvheu0/nwKdgNNNBf1dolKuxH/dvPS', 'admin.png', 1, NULL, NULL, '2022-07-06 19:40:10', '2022-07-06 19:52:10', 1, NULL, NULL),
(2, 'user', 'user@example.com', '$2y$10$XmzNRxJvb7vAESkwq8Rs5OKfBvgfTKNwwbAM3u2u9u8dbxXpf1Ua2', 'user.png', 1, NULL, NULL, '2022-07-06 19:40:10', '2022-07-06 19:52:10', 1, NULL, NULL),
(3, 'Indra Mustholih, S.Kom', '199406112022031002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 1, NULL, '199406112022031002', '2022-07-06 19:40:10', '2022-07-06 19:52:10', 30, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a\r\n'),
(4, 'drg. Inda Torisia Hatang, MKM', '197307132002122005', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197307132002122005', NULL, NULL, 1, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Tk.I - IV/b'),
(8, 'Siti Khadijah, S.Si, Apt, MM', '197912262005012003', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197912262005012003', NULL, NULL, 2, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina-IV/a'),
(9, 'Yuniyati, S.Sos, M.Si', '196505281985032001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196505281985032001', NULL, NULL, 3, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina-IV/a'),
(10, 'dr. Rini Haryanti', '198003312009122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198003312009122001', NULL, NULL, 4, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Tk.I - III/d'),
(11, 'dr. Betriza, SpJP', '196302181989122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196302181989122001', NULL, NULL, 5, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama-IV/e'),
(12, 'dr. D.Wahyuni Sp RM', '195807211988122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '195807211988122001', NULL, NULL, 5, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Madya-IV/d'),
(13, 'dr. Eviana Roza Kadri', '195806071991032001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '195806071991032001', NULL, NULL, 5, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Madya-IV/d'),
(14, 'drg. Irawan Soediono', '196709141992031003', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196709141992031003', NULL, NULL, 6, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Madya-IV/d'),
(15, 'dr. Endriana S. Lubis, MKK, Sp.Ok', '196610242002122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196610242002122001', NULL, NULL, 7, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Muda - IV/c'),
(16, 'dr. Sri Mulyani,  SpP', '196703211999032001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196703211999032001', NULL, NULL, 7, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Muda - IV/c'),
(17, 'dr. Khairunnisa', '197105101999032005', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197105101999032005', '2022-07-06 19:40:10', NULL, 7, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Utama Muda - IV/c'),
(18, 'dr. Sumita', '196909172002122002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196909172002122002', '2022-07-06 19:40:10', NULL, 7, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina Tk.I - IV/b'),
(19, 'drg. Surnetty Aqwari', '197202142006042007', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197202142006042007', '2022-07-06 19:40:10', NULL, 8, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina-IV/a'),
(20, 'drg. Tuti Elvira Nency', '197805242006042005', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197805242006042005', '2022-07-06 19:40:10', NULL, 8, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pembina-IV/a'),
(21, 'drg. Nurul Puspita Sari, Sp.KG', '198011222010012013', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198011222010012013', '2022-07-06 19:40:10', NULL, 9, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Tk.I-III/d'),
(22, 'Sri Endang Pangestuti, A.Md.Kep', '196507081989032002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196507081989032002', '2022-07-06 19:40:10', '2022-07-06 19:52:10', 10, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Tk.I-III/d'),
(23, 'Mika Susianti, A.Md.Kes', '196703051989112001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '196703051989112001', NULL, NULL, 10, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Tk.I-III/d'),
(24, 'Evi Wahyuni, A.Md.Kes', '197110111994032001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197110111994032001', NULL, NULL, 11, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata - III/c'),
(25, 'Nurasiah, SKM', '197405072000032005', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '197405072000032005', NULL, NULL, 11, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata - III/c'),
(26, 'Yuni Asri Sembiring, Am.Ak', '198306212006042008', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198306212006042008', NULL, NULL, 12, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda Tk.I - III/b'),
(27, 'Nurul Ayyumi, A.Md.Rad', '198502012008012002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198502012008012002', NULL, NULL, 13, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda Tk.I - III/b'),
(28, 'Nur Chasanah, S.Farm Apt.', '199103032019022001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199103032019022001', NULL, NULL, 14, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda Tk.I - III/b'),
(29, 'Alfi Shariati, S.A.P', '198209152008122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198209152008122001', NULL, NULL, 15, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(30, 'Tri Tungga Dewi Kusumawati, AMF', '198307312009122001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198307312009122001', NULL, NULL, 16, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(31, 'Catur Setia Dewi, AMF', '198406222009122002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198406222009122002', NULL, NULL, 16, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(32, 'Lestari, A.Md.Kep', '198306212010122004', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198306212010122004', NULL, NULL, 17, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(33, 'Ahmad Fauzan, A.Md', '198408202010121002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198408202010121002', NULL, NULL, 18, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(34, 'Shinta Indah Pratiwi, A.Md.Kep', '198610272009122003', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198610272009122003', NULL, NULL, 19, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur Tk.I - II/d'),
(35, 'Indah Stefiastuti Rahayu, S.AP', '198902182010122004', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198902182010122004', NULL, NULL, 20, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(36, 'Erni Novita Sari, SKM', '199211072020122003', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199211072020122003', NULL, NULL, 21, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a'),
(37, 'Citra Sri Martani, Am.Ak', '198009232010122002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198009232010122002', NULL, NULL, 22, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur Tk.I - II/d'),
(38, 'Anisa Dwi Silvia Fisudurini, Am.Ak', '199201302018012001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199201302018012001', NULL, NULL, 23, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(39, 'Eza Pramedia, A.Md.Kep', '199205142018012001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199205142018012001', NULL, NULL, 24, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(40, 'Evi Wulandari, A.Md.Kep', '198902242018022001', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '198902242018022001', NULL, NULL, 24, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(41, 'Mohammad Alif Nur Fathoni, A.Md.Rad', '199308252019021002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199308252019021002', NULL, NULL, 25, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(42, 'Yudi Dharmawan, A.Md.KG', '199704092020121002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199704092020121002', NULL, NULL, 26, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(43, 'Fissilmi Kaaffah, A.Md.', '199601242020122006', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199601242020122006', NULL, NULL, 27, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(44, 'Balqis muharamy', '199107262022032002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199107262022032002', NULL, NULL, 28, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Pengatur - II/c'),
(45, 'dr. Indah Pratiwi', '199207312022032002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199207312022032002', NULL, NULL, 29, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda Tk.I - III/b'),
(47, 'Wina Happy Lucky, S.E', '199507242022032003', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '199507242022032003', NULL, NULL, 31, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', 'Penata Muda - III/a\r\n'),
(48, 'Nur Astuti Wijoreni, SKM', '919901202201801201', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919901202201801201', NULL, NULL, 32, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(49, 'Septian Edi Prianto', '919880919201801101', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919880919201801101', NULL, NULL, 33, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(50, 'Fenny Alvionita, S.Keb, Bd.', '919920327201907201', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919920327201907201', NULL, NULL, 34, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(51, 'Akhmad Khaeroni', '1111111111', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '1111111111', NULL, NULL, NULL, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(52, 'Laras Sari Aji Ningrum, S.Farm, Apt', '919960227202101201', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919960227202101201', NULL, NULL, 35, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(53, 'Benita Puspita Sari, SKM', '919960918202102201', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919960918202102201', NULL, NULL, 32, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(54, 'Ira Fahmawati Wahyu Sejati, S.Tr. Keb, Bd.', '919940823202102201', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919940823202102201', NULL, NULL, 32, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(55, 'Titania Aurelly Amry, S.E.', '5555555555', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '5555555555', NULL, NULL, 32, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(56, 'Ramadhani Nur Fathur R', '919980113202111101', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919980113202111101', NULL, NULL, 32, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(57, 'Mukhlis, S.Kom', '919930524202108101', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', 'user.png', 2, NULL, '919930524202108101', NULL, NULL, 33, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL),
(60, 'dr Khairani Ramadhani', '198406252017052002', '$2y$10$hwhCZlJse6VhHD8kncdBXeyP6gtrGxoZ2sKkKZLDtWUAwkUwNEle.', NULL, 2, NULL, '198406252017052002', NULL, NULL, 36, 'Unit Pelayanan Kesehatan Kementerian Kesehatan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan_kerjas`
--
ALTER TABLE `jabatan_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan_jabatans`
--
ALTER TABLE `kegiatan_jabatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jabatan_kerja` (`id_jabatan_kerja`);

--
-- Indeks untuk tabel `kegiatan_jabatan_tambahans`
--
ALTER TABLE `kegiatan_jabatan_tambahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_kegiatans`
--
ALTER TABLE `log_kegiatans`
  ADD PRIMARY KEY (`id_log_kegiatan`);

--
-- Indeks untuk tabel `log_kegiatan_tambahans`
--
ALTER TABLE `log_kegiatan_tambahans`
  ADD PRIMARY KEY (`id_log_kegiatan_tambahan`);

--
-- Indeks untuk tabel `master_kegiatans`
--
ALTER TABLE `master_kegiatans`
  ADD PRIMARY KEY (`id`,`id_user`,`id_kegiatan_jabatan`,`tahun`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `master_kegiatan_tambahans`
--
ALTER TABLE `master_kegiatan_tambahans`
  ADD PRIMARY KEY (`id_master_kegiatan_tambahan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan_kerjas`
--
ALTER TABLE `jabatan_kerjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_jabatans`
--
ALTER TABLE `kegiatan_jabatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_jabatan_tambahans`
--
ALTER TABLE `kegiatan_jabatan_tambahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `log_kegiatans`
--
ALTER TABLE `log_kegiatans`
  MODIFY `id_log_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `log_kegiatan_tambahans`
--
ALTER TABLE `log_kegiatan_tambahans`
  MODIFY `id_log_kegiatan_tambahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `master_kegiatans`
--
ALTER TABLE `master_kegiatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_kegiatan_tambahans`
--
ALTER TABLE `master_kegiatan_tambahans`
  MODIFY `id_master_kegiatan_tambahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan_jabatans`
--
ALTER TABLE `kegiatan_jabatans`
  ADD CONSTRAINT `kegiatan_jabatans_ibfk_1` FOREIGN KEY (`id_jabatan_kerja`) REFERENCES `jabatan_kerjas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `master_kegiatans`
--
ALTER TABLE `master_kegiatans`
  ADD CONSTRAINT `master_kegiatans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
