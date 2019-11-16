-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2019 pada 07.21
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilai_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `kode_fakultas` varchar(35) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
('FK01', 'Fakultas Teknik Komunikasi dan Infromatika'),
('FK02', 'Fakultas Hukum'),
('FK03', 'Fakultas Teknik dan Sains'),
('FK04', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
('FK05', 'Fakultas Bahasa dan Sastra'),
('FK06', 'Fakultas Ekonomi dan Bisnis'),
('FK07', 'Fakultas Biologi'),
('FK08', 'Fakultas Pertanian'),
('FK09', 'Fakultas Ilmu Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `kode_fakultas` varchar(35) NOT NULL,
  `kode_prodi` varchar(35) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `kode_fakultas`, `kode_prodi`, `gambar`, `created`) VALUES
(2405982, 'Rafi Syahputra', 'Laki-Laki', 'FK01', 'P01', '5d3a7ee43502b.jpg', 0),
(2405983, 'Ridwan', 'Laki-Laki', 'FK01', 'P02', '5d360788db521.jpg', 0),
(2405984, 'Ahmad Mujahid', 'Laki-Laki', 'FK01', 'P01', '5d36079ec4e68.jpg', 0),
(2405985, 'Ferdian Ahmad', 'Laki-Laki', 'FK01', 'P01', '5d3607a909cdd.jpg', 0),
(2405987, 'Budianto', 'Laki-Laki', 'FK01', 'P01', '5d37261e0a70e.jpg', 0),
(24059810, 'Pinki', 'Perempuan', 'FK09', 'P22', '5d939e28f2f95.jpg', 0),
(2147483647, 'Syahril', 'Laki-Laki', 'FK02', 'P09', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_matkul` varchar(11) NOT NULL,
  `nama_matkul` varchar(128) NOT NULL,
  `kode_fakultas` varchar(11) NOT NULL,
  `kode_prodi` varchar(11) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_matkul`, `nama_matkul`, `kode_fakultas`, `kode_prodi`, `sks`) VALUES
('MK001', 'Dasar - Dasar Pemrograman I', 'FK01', 'P01', 2),
('MK002', 'Dasar - Dasar Pemrograman II', 'FK01', 'P01', 2),
('MK003', 'Enterprise Resource Planning', 'FK01', 'P01', 3),
('MK004', 'Pemrograman Berbasis Web I', 'FK01', 'P01', 2),
('MK005', 'Pemrograman Berbasis Web II', 'FK01', 'P01', 2),
('MK006', 'Pengantar Sistem Informasi Bisnis', 'FK01', 'P01', 2),
('MK010', 'RKUHP', 'FK02', 'P09', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `kode_matkul` varchar(11) NOT NULL,
  `nilai` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `nim`, `kode_matkul`, `nilai`) VALUES
(3, 2405982, 'MK001', 90),
(5, 2405982, 'MK002', 80),
(6, 2405982, 'MK003', 75),
(7, 2405983, 'MK001', 90),
(8, 2405987, 'MK001', 50),
(9, 2405982, 'MK006', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kode_prodi` varchar(35) NOT NULL,
  `kode_fakultas` varchar(35) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`kode_prodi`, `kode_fakultas`, `nama_prodi`) VALUES
('P01', 'FK01', 'Sistem Informasi'),
('P02', 'FK01', 'Informatika'),
('P03', 'FK03', 'Teknik Fisika'),
('P04', 'FK04', 'Ilmu Politik'),
('P05', 'FK04', 'Hubungan Internasional'),
('P06', 'FK04', 'Ilmu Administrasi Negara'),
('P07', 'FK04', 'Sosiologi'),
('P08', 'FK04', 'Ilmu Komunikasi'),
('P09', 'FK02', 'Ilmu Hukum'),
('P10', 'FK05', 'Sastra Inggris'),
('P11', 'FK05', 'Sastra Indonesia'),
('P12', 'FK05', 'Sastra Jepang'),
('P13', 'FK05', 'Bahasa Korea'),
('P14', 'FK06', 'Manajemen'),
('P15', 'FK06', 'Akuntansi'),
('P16', 'FK06', 'Pariwisata'),
('P17', 'FK03', 'Fisika'),
('P18', 'FK03', 'Teknik Elektro'),
('P19', 'FK03', 'Teknik Mesin'),
('P20', 'FK07', 'Biologi'),
('P21', 'FK08', 'Agroteknologi'),
('P22', 'FK09', 'Keperawatan'),
('P23', 'FK09', 'Kebidanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `tb_matkul` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
