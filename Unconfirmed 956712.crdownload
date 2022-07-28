-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 05.37
-- Versi server: 8.0.28
-- Versi PHP: 8.0.10

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
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(28, '16siy42DYKeso', 1, '2022-07-26 07:15:17', 'Selesai'),
(29, '16Y8eTmc3eosA', 1, '2022-07-26 07:50:35', 'Selesai'),
(30, '16UkcG8e563uY', 1, '2022-07-26 08:03:40', 'Selesai'),
(31, '166Dil0u8uBAI', 1, '2022-07-27 01:07:20', 'Selesai'),
(32, '16S6RVz1Xs0aU', 1, '2022-07-27 05:45:25', 'Selesai'),
(33, 'egereh45343t3', 1, '2022-07-27 05:45:25', 'Selesai'),
(34, 'segdrhtfbdvsd', 1, '2022-07-27 05:45:25', 'Selesai'),
(35, 'dfb7dfbd98fb7', 1, '2022-07-27 05:45:25', 'Selesai'),
(36, 'bs9d8svdv98sb', 1, '2022-07-27 05:45:25', 'Selesai'),
(37, 'gymog8um80h9g', 1, '2022-07-27 05:45:25', 'Selesai'),
(38, 'awdat4wdt52t3', 1, '2022-07-27 05:45:25', 'Selesai'),
(39, 'ygk0u9l8h09j8', 1, '2022-07-27 05:45:25', 'Selesai'),
(40, 'awd6512423rfh', 1, '2022-07-27 05:45:25', 'Selesai'),
(41, 'hygk0h9ilj80k', 1, '2022-07-27 05:45:25', 'Selesai'),
(42, 'awd983420tjoi', 1, '2022-07-27 05:45:25', 'Selesai'),
(43, 'fyljl9g9b8yd8', 1, '2022-07-27 05:45:25', 'Selesai'),
(44, 'sbdgmgh9nfub0', 1, '2022-07-27 05:45:25', 'Selesai'),
(45, 'gn0neoprh4j0t', 1, '2022-07-27 05:45:25', 'Selesai'),
(46, 'zscbsyqfg2986', 1, '2022-07-27 05:45:25', 'Selesai'),
(47, 'gj98o70kpynjo', 1, '2022-07-27 05:45:25', 'Selesai'),
(48, 'awcf3i4uht9g8', 1, '2022-07-27 05:45:25', 'Selesai'),
(49, 'wd23ut44y59hj', 1, '2022-07-27 05:45:25', 'Selesai'),
(50, 'btfnynt0nkn44', 1, '2022-07-27 05:45:25', 'Selesai'),
(51, 'sevac02poj09w', 1, '2022-07-27 05:45:25', 'Selesai'),
(52, 'awd1d0-0gojrn', 1, '2022-07-27 05:45:25', 'Selesai'),
(53, 'xcxnbogpj2i4f', 1, '2022-07-27 05:45:25', 'Selesai'),
(54, 'htykoyu0k9uik', 1, '2022-07-27 05:45:25', 'Selesai'),
(55, 'ascznxvowgh39', 1, '2022-07-27 05:45:25', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idproduk`, `qty`) VALUES
(40, '166Dil0u8uBAI', 64, 24),
(41, '16S6RVz1Xs0aU', 71, 35),
(42, 'egereh45343t3', 63, 67),
(43, 'segdrhtfbdvsd', 65, 132),
(44, 'dfb7dfbd98fb7', 72, 39),
(45, 'bs9d8svdv98sb', 76, 35),
(46, 'gymog8um80h9g', 77, 16),
(47, 'awdat4wdt52t3', 78, 31),
(48, 'ygk0u9l8h09j8', 79, 45),
(49, 'awd6512423rfh', 80, 42),
(50, 'hygk0h9ilj80k', 81, 32),
(51, 'awd983420tjoi', 83, 38),
(52, 'fyljl9g9b8yd8', 84, 103),
(53, 'sbdgmgh9nfub0', 85, 18),
(54, 'gn0neoprh4j0t', 86, 37),
(55, 'zscbsyqfg2986', 87, 20),
(56, 'gj98o70kpynjo', 89, 29),
(57, 'awcf3i4uht9g8', 90, 24),
(58, 'wd23ut44y59hj', 91, 20),
(59, 'btfnynt0nkn44', 92, 26),
(60, 'sevac02poj09w', 93, 29),
(61, 'awd1d0-0gojrn', 94, 25),
(62, 'xcxnbogpj2i4f', 95, 38),
(63, 'htykoyu0k9uik', 96, 39),
(64, 'ascznxvowgh39', 97, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int NOT NULL,
  `namakategori` varchar(20) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Alat Tulis'),
(2, 'Buku Tulis'),
(3, 'Meja Belajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`) VALUES
(12, '16siy42DYKeso', 1, 'GOPAY', 'Sulai', '2022-07-12', '2022-07-26 07:16:01'),
(13, '16Y8eTmc3eosA', 1, 'GOPAY', 'Gudang', '2022-07-21', '2022-07-26 07:51:18'),
(14, '166Dil0u8uBAI', 1, 'Bank BCA', 'awd', '0000-00-00', '2022-07-27 01:10:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Admin', 'admin', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', '01234567890', 'Indonesia', '2020-03-16 11:31:17', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no` int NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no`, `metode`, `norek`, `logo`, `an`) VALUES
(4, 'GOPAY', '+6289637739631', 'images/gopay.jpg', 'GOPAY AL'),
(5, 'Bank BCA', '123123123', 'images/bca.jpg', 'BCA ASD'),
(6, 'DANA', '+6289637739631', 'images/dana.png', 'DANA AL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int NOT NULL,
  `idkategori` int DEFAULT NULL,
  `namaproduk` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `hargabefore` int DEFAULT NULL,
  `hargaafter` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `stok`, `ukuran`) VALUES
(63, 1, 'Pulpen Standard AE7', 'produk/16nNa0nzACs3I.jpg', 'oke', 5, 3000, 2500, 200, 'kecil'),
(64, 1, 'Pulpen Pilot BPT-P', 'produk/16pJdbBhL8ep..jpg', 'oke', 5, 3000, 2000, 118, 'kecil'),
(65, 1, 'Pulpen Gel JOYKO GP-265', 'produk/16V8uQagDJqtA.jpg', 'oke', 5, 5000, 4000, 367, 'kecil'),
(71, 1, 'Pulpen FASTER C6000', 'produk/16.AVw.grdCP6.jpg', 'oke', 5, 4000, 3500, 151, 'kecil'),
(72, 1, 'Pulpen FASTER C6', 'produk/16NKQtxnFnMD..jpg', 'oke', 5, 4500, 3000, 87, 'kecil'),
(76, 3, 'Meja Belajar Lipat Kayu', 'produk/16n3yVwvu83HQ.png', 'oke', 4, 30000, 25000, 19, 'besar'),
(77, 1, 'Penghapus JOYKO Medium Putih', 'produk/16MvlYYeRCUV..png', 'oke', 5, 2500, 2000, 54, 'besar'),
(78, 1, 'Penghapus JOYKO Kecil Putih', 'produk/16HL.aRWYpq6c.png', 'oke', 5, 2000, 1500, 32, 'kecil'),
(79, 1, 'Penghapus JOYKO Medium Hitam', 'produk/16RYKAzhZELa2.png', 'oke', 5, 2500, 2000, 43, 'kecil'),
(80, 1, 'Penghapus JOYKO Kecil Hitam', 'produk/16pob3l2f.s7s.jpg', 'oke', 4, 2000, 1500, 27, 'kecil'),
(81, 3, 'Meja Belajar Lipat Plastik', 'produk/16A8zA9vhx2jY.jpg', 'oke', 5, 50000, 45000, 23, 'kecil'),
(83, 1, 'Penghapus Faber Castell EBTA & SPMB', 'produk/16MvlYYeRCUV..jpg', 'oke2', 5, 8500, 7500, 62, 'kecil'),
(84, 1, 'Pensil  Faber Castell 2B Ujian Komputer', 'produk/164oWp3H4J.gk.jpg', 'oke3', 4, 7000, 6000, 126, 'kecil'),
(85, 1, 'Paket Alat Tulis Ujian Komputer Faber Castell', 'produk/167vlPWDQRFGY.jpg', 'oke6', 5, 50000, 40000, 50, 'besar'),
(86, 1, 'Rautan Putar Deli', 'produk/16ti6jXQGxaD..jpg', 'oke', 4, 30000, 25000, 32, 'kecil'),
(87, 1, 'Tip X Cair Voxy', 'produk/16cY7xtNuM8Z6.jpg', 'oke', 5, 7000, 5000, 23, 'kecil'),
(89, 1, 'Tip X Roll JOYKO 522', 'produk/Tip X Roll JOYKO 522.jpg62e0e3e42bffe5.60113830.jpg', 'oke', 4, 15000, 10000, 32, 'kecil'),
(90, 1, 'Spidol Permanent Snowman Hitam', 'produk/Spidol Permanen Snowman Hitam.jpg62e0e43ff14737.82395677.jpg', 'oke', 4, 10000, 8000, 46, 'kecil'),
(91, 1, 'Spidol Permanent Snowman Merah', 'produk/Spidol Permanen Snowman Merah.jpg62e0e475e16d03.95285671.jpg', 'oke', 4, 10000, 8000, 29, 'kecil'),
(92, 1, 'Spidol Permanent Snowman Biru', 'produk/Spidol Permanen Snowman Biru.jpg62e0e498d91928.31224358.jpg', 'oke', 4, 10000, 8000, 23, 'kecil'),
(93, 2, 'Buku Tulis Sidu 38 lembar (10Pcs)', 'produk/Buku Tulis Sidu 38 Lembar.jpg62e0e50265f161.98353050.jpg', 'ok', 4, 48000, 38000, 48, 'besar'),
(94, 2, 'Buku Tulis big boss 42 lembar (6pcs)', 'produk/Buku Tulis BIG BOSS 42 Lembar.jpg62e0e56a2e4791.75450592.jpg', 'ok', 5, 48000, 38000, 52, 'besar'),
(95, 2, 'nota kontan ', 'produk/Nota Kontan Paperline 2 Rangkap.jpg62e0e5a67e1718.39652431.jpg', 'ok', 5, 10000, 7000, 40, 'kecil'),
(96, 1, 'Stabilo joyko all warna', 'produk/Stabilo Highligter Joyko All Warna.jpg62e0e5fa68e376.74622629.jpg', 'oke', 5, 8000, 5500, 64, 'kecil'),
(97, 1, 'Pencil Mekanik Pilot H-165', 'produk/Pencil Mekanik Pilot H-165.jpg62e0e62e960017.45352823.jpg', 'oke', 2, 30000, 25000, 21, 'kecil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
