-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2019 pada 08.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandorng_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi_barang` varchar(40) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `kondisi` int(2) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `total_barang`, `kondisi`, `jenis_barang`, `sumber_dana`) VALUES
('MB1', 'Motherboard Asal', 'Baru', 'Kelas', 'Hardware', 10, 1, 'Motherboard', 'Hamba'),
('MB2', 'Motherboard', 'asd', '123', 'mb', 3, 0, 'mb', 'mb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id_brg_keluar` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `jml_brg_keluar` int(8) NOT NULL,
  `jml_brg_keluar_old` int(11) NOT NULL,
  `keperluan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar_barang`
--

INSERT INTO `keluar_barang` (`id_brg_keluar`, `kode_barang`, `tgl_keluar`, `penerima`, `jml_brg_keluar`, `jml_brg_keluar_old`, `keperluan`) VALUES
(1, 'MB1', '2019-04-27', 'Wahyu', 1, 1, 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id_brg_masuk` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_brg_masuk` int(8) NOT NULL,
  `jml_brg_masuk_old` int(11) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_brg_masuk`, `kode_barang`, `tgl_masuk`, `jml_brg_masuk`, `jml_brg_masuk_old`, `kode_supplier`) VALUES
(6, 'MB1', '2019-04-26', 10, 10, 'AP1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_brg_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jml_pinjam` int(8) NOT NULL,
  `jml_pinjam_old` int(8) NOT NULL,
  `peminjaman` varchar(35) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_brg_pinjam`, `tgl_pinjam`, `kode_barang`, `jml_pinjam`, `jml_pinjam_old`, `peminjaman`, `tgl_kembali`, `keterangan`) VALUES
(8, '2019-04-27', 'MB1', 1, 1, 'wahyu', '2019-04-27', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(20) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('AP1', 'Wahyudin', 'Tangerang', '021123123', 'Tangerang'),
('SD2', 'SD Negeri 01', 'Pondok Aren, Tangerang Selatan', '021232323', 'Pondok Aren'),
('SD3', 'SD Negeri 04 Jakarta', 'Samping Masjid, Jakarta', '0214553342', 'Jakarta'),
('SP4', 'SMP Tangsel 01', 'Tangerang Selatan', '021123123', 'Tangsel1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Manajemen', 'manajemen', '19b51f1cbb6146adcacbce46d5bdc3f2', 2),
(3, 'Wahyudin', 'peminjam', '55f3894bc5fc71fead8412d321c2952c', 3),
(4, 'wahyu', 'wahyu', '8cbbdc3fff847eee79abadc7b693b60e', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userlog`
--

INSERT INTO `userlog` (`id`, `id_user`, `userIp`, `loginTime`) VALUES
(4, 1, 0x3a3a31, '2019-04-26 14:51:59'),
(5, 2, 0x3a3a31, '2019-04-26 14:52:15'),
(6, 1, 0x3a3a31, '2019-04-26 14:52:22'),
(7, 1, 0x3a3a31, '2019-04-27 00:15:35'),
(8, 1, 0x3a3a31, '2019-04-27 00:23:01'),
(9, 2, 0x3a3a31, '2019-04-27 00:23:18'),
(10, 3, 0x3a3a31, '2019-04-27 00:26:15'),
(11, 1, 0x3a3a31, '2019-04-27 00:42:04'),
(12, 1, 0x3a3a31, '2019-04-27 00:58:14'),
(13, 3, 0x3a3a31, '2019-04-27 01:25:59'),
(14, 1, 0x3a3a31, '2019-04-27 01:36:39'),
(15, 2, 0x3a3a31, '2019-04-27 01:42:57'),
(16, 2, 0x3a3a31, '2019-04-27 01:49:09'),
(17, 1, 0x3a3a31, '2019-04-27 01:49:39'),
(18, 1, 0x3a3a31, '2019-04-27 02:21:02'),
(19, 1, 0x3a3a31, '2019-04-27 04:11:15'),
(20, 1, 0x3a3a31, '2019-04-27 04:16:53'),
(21, 3, 0x3a3a31, '2019-04-27 04:34:28'),
(22, 3, 0x3a3a31, '2019-04-27 04:35:06'),
(23, 1, 0x3a3a31, '2019-04-27 04:48:21'),
(24, 1, 0x3a3a31, '2019-04-27 05:22:36'),
(25, 1, 0x3a3a31, '2019-04-27 05:44:38'),
(26, 3, 0x3a3a31, '2019-04-27 05:53:12'),
(27, 1, 0x3a3a31, '2019-04-27 05:54:44'),
(28, 2, 0x3a3a31, '2019-04-27 05:54:53'),
(29, 1, 0x3a3a31, '2019-04-27 05:55:16'),
(30, 3, 0x3a3a31, '2019-04-27 05:56:07'),
(31, 2, 0x3a3a31, '2019-04-27 06:16:09'),
(32, 1, 0x3a3a31, '2019-04-27 06:17:24'),
(33, 2, 0x3a3a31, '2019-04-27 06:18:25'),
(34, 1, 0x3a3a31, '2019-04-27 06:19:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id_brg_keluar`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id_brg_masuk`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_brg_pinjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar_barang`
--
ALTER TABLE `keluar_barang`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `masuk_barang`
--
ALTER TABLE `masuk_barang`
  MODIFY `id_brg_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id_brg_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD CONSTRAINT `keluar_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD CONSTRAINT `masuk_barang_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`),
  ADD CONSTRAINT `masuk_barang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
