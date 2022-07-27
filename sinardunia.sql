-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinardunia`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(28, '16siy42DYKeso', 1, '2022-07-26 07:15:17', 'Selesai'),
(29, '16Y8eTmc3eosA', 1, '2022-07-26 07:50:35', 'Selesai'),
(30, '16UkcG8e563uY', 1, '2022-07-26 08:03:40', 'Selesai'),
(31, '166Dil0u8uBAI', 1, '2022-07-27 01:07:20', 'Selesai'),
(32, '16S6RVz1Xs0aU', 1, '2022-07-27 05:45:25', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idproduk`, `qty`) VALUES
(40, '166Dil0u8uBAI', 64, 2),
(41, '16S6RVz1Xs0aU', 71, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Alat Tulis'),
(2, 'Buku Tulis'),
(3, 'Meja Belajar');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`) VALUES
(12, '16siy42DYKeso', 1, 'GOPAY', 'Sulai', '2022-07-12', '2022-07-26 07:16:01'),
(13, '16Y8eTmc3eosA', 1, 'GOPAY', 'Gudang', '2022-07-21', '2022-07-26 07:51:18'),
(14, '166Dil0u8uBAI', 1, 'Bank BCA', 'awd', '0000-00-00', '2022-07-27 01:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Admin', 'admin', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', '01234567890', 'Indonesia', '2020-03-16 11:31:17', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no`, `metode`, `norek`, `logo`, `an`) VALUES
(4, 'GOPAY', '+6289637739631', 'images/gopay.jpg', 'GOPAY AL'),
(5, 'Bank BCA', '123123123', 'images/bca.jpg', 'BCA ASD'),
(6, 'DANA', '+6289637739631', 'images/dana.png', 'DANA AL');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `namaproduk` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `hargabefore` int(11) DEFAULT NULL,
  `hargaafter` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `stok`, `ukuran`) VALUES
(63, 1, 'Pulpen Standard AE7', 'produk/16nNa0nzACs3I.jpg', 'oke', 5, 3000, 2500, 200, 'kecil'),
(64, 1, 'Pulpen Pilot BPT-P', 'produk/16pJdbBhL8ep..jpg', 'oke', 5, 3000, 2000, 118, 'kecil'),
(65, 1, 'Pulpen Gel JOYKO GP-265', 'produk/16V8uQagDJqtA.jpg', 'oke', 5, 5000, 4000, 367, 'besar'),
(71, 1, 'Pulpen FASTER C6000', 'produk/16.AVw.grdCP6.jpg', 'oke', 5, 4000, 3500, 151, 'kecil'),
(72, 1, 'Pulpen FASTER C6', 'produk/16NKQtxnFnMD..jpg', 'oke', 5, 4500, 3000, 87, 'kecil'),
(76, 3, 'Meja Belajar Lipat Kayu', 'produk/16n3yVwvu83HQ.png', 'oke', 4, 30000, 25000, 19, 'besar'),
(77, 1, 'Penghapus JOYKO Medium Putih', 'produk/16MvlYYeRCUV..png', 'oke', 5, 2500, 2000, 54, 'kecil'),
(78, 1, 'Penghapus JOYKO Kecil Putih', 'produk/16HL.aRWYpq6c.png', 'oke', 5, 2000, 1500, 32, 'kecil'),
(79, 1, 'Penghapus JOYKO Medium Hitam', 'produk/16RYKAzhZELa2.png', 'oke', 5, 2500, 2000, 43, 'kecil'),
(80, 1, 'Penghapus JOYKO Kecil Hitam', 'produk/16pob3l2f.s7s.jpg', 'oke', 4, 2000, 1500, 27, 'kecil'),
(81, 3, 'Meja Belajar Lipat Plastik', 'produk/16A8zA9vhx2jY.jpg', 'oke', 5, 50000, 45000, 23, 'besar'),
(83, 1, 'Penghapus Faber Castell EBTA & SPMB', 'produk/16MvlYYeRCUV..jpg', 'oke2', 5, 8500, 7500, 62, 'kecil'),
(84, 1, 'Pensil  Faber Castell 2B Ujian Komputer', 'produk/164oWp3H4J.gk.jpg', 'oke3', 4, 7000, 6000, 126, 'kecil'),
(85, 1, 'Paket Alat Tulis Ujian Komputer Faber Castell', 'produk/167vlPWDQRFGY.jpg', 'oke6', 5, 50000, 40000, 50, 'kecil'),
(86, 1, 'Rautan Putar Deli', 'produk/16ti6jXQGxaD..jpg', 'oke', 4, 30000, 25000, 32, 'kecil'),
(87, 1, 'Tip X Cair Voxy', 'produk/16cY7xtNuM8Z6.jpg', 'oke', 5, 7000, 5000, 23, 'kecil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id_data` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL,
  `x4` varchar(16) DEFAULT NULL,
  `keputusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL,
  `x4` varchar(16) DEFAULT NULL,
  `prediksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_pengujian`
--

CREATE TABLE `tb_hasil_pengujian` (
  `id_hasil` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL,
  `x4` varchar(16) DEFAULT NULL,
  `prediksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_hasil_pengujian`
--
ALTER TABLE `tb_hasil_pengujian`
  ADD PRIMARY KEY (`id_hasil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
