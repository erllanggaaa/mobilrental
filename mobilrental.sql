-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jul 2019 pada 17.38
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobilrental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
`id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Manual'),
(2, 'Matic'),
(3, 'Manual dan Matic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE IF NOT EXISTS `tb_mobil` (
`id_mobil` int(5) NOT NULL,
  `foto_mobil` varchar(25) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `type_mobil` varchar(25) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `no_polisi` varchar(12) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `foto_mobil`, `id_jenis`, `type_mobil`, `merk`, `no_polisi`, `warna`, `harga`, `status`) VALUES
(1, '09-03-2018Avanza 2010.jpg', 2, 'Avanza 2010', 'Toyota', 'B 1996 END', 'Silver', 200000, 0),
(2, 'Honda Mobilio 2017.png', 1, 'Mobilio 2017', 'Honda', 'B 0102 BGL', 'Merah Marun', 275000, 0),
(3, 'Suzuki_Ertiga 2017.jpg', 1, 'Ertigo 2017', 'Suzuki', 'B 9876 TES', 'Silver', 265000, 1),
(4, 'Honda Mobilio 2019.png', 1, 'Mobilio 2019', 'Honda', 'B 7828 CI', 'Merah', 350000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
`id_pelanggan` int(5) NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `status_peminjaman` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `no_ktp`, `nama_lengkap`, `alamat_pelanggan`, `no_telepon`, `status_peminjaman`) VALUES
(1, 123456789, 'Muhammad Erlangga', 'Jl. Jalan Jalan Dah', '0895325632732', 2),
(2, 987654321, 'Raka Muhammad Ridwan', 'Jl. Jalan Jalan Mari', '089531234216', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
`id_bayar` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `pembayaran` varchar(25) NOT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_bayar`, `id_transaksi`, `tgl_bayar`, `pembayaran`, `no_rek`, `nama_bank`, `atas_nama`) VALUES
(1, 1, '2019-07-08', 'Cash', '', '', ''),
(2, 2, '2019-07-12', 'Transfer Bank', '89438931', 'BCA', 'Raka Nich');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tb_pengembalian` (
`id_pengembalian` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `terlambat` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `id_transaksi`, `harga`, `terlambat`) VALUES
(1, 1, 275000, 0),
(2, 2, 200000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
`id_transaksi` int(5) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_sewa` datetime NOT NULL,
  `tgl_selesaisewa` datetime NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `status_pembayaran` int(5) NOT NULL,
  `status_pengembalian` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_mobil`, `harga`, `id_pelanggan`, `nama_lengkap`, `tgl_sewa`, `tgl_selesaisewa`, `jumlah_harga`, `denda`, `status_pembayaran`, `status_pengembalian`) VALUES
(1, 2, 275000, 1, 'Muhammad Erlangga', '2019-07-07 09:00:00', '2019-07-08 11:00:00', 275000, 0, 1, 1),
(2, 1, 200000, 2, 'Raka Muhammad Ridwan', '2019-07-10 13:00:00', '2019-07-13 15:00:00', 600000, 200000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
 ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
 ADD PRIMARY KEY (`id_bayar`), ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
 ADD PRIMARY KEY (`id_pengembalian`), ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_mobil` (`id_mobil`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
MODIFY `id_mobil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
MODIFY `id_pengembalian` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
