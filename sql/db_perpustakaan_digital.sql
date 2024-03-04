-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 04:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `bukuid` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `stok` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`bukuid`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
(1, 'Cerita SI Kancil', 'BANG', 'Epan', 2022, 8),
(2, 'Ensiklopedia Biografi', 'Mas Faris', 'Bang', 1998, 151),
(3, 'Doraemon vol 10', 'contoh data', 'contoh data', 2012, 9),
(4, 'Legenda Malin Kundang', 'data contoh', 'data contoh', 1998, 12),
(5, 'Kumpulan Cerita Rakyat', 'contoh contoh', 'data data', 2001, 552),
(10, 'Si hitam yang malang', 'Faris', 'Deru', 2024, 34),
(11, 'Contoh Judul 2', 'Contoh Penulis 2', 'Ahjkj', 2012, 0),
(12, 'PG SCHOOL 1', 'kiel', 'wattpad', 2020, 30),
(13, 'hitam', 'putih', 'bule', 2002, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `kategoriid` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`kategoriid`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Dongeng'),
(3, 'Ensiklopedia'),
(4, 'Novel'),
(5, 'Cergam');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `kategoribukuid` int(11) NOT NULL,
  `bukuid` int(11) NOT NULL,
  `kategoriid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`kategoribukuid`, `bukuid`, `kategoriid`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 1),
(4, 4, 2),
(13, 5, 2),
(22, 10, 1),
(25, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bukuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`koleksiid`, `userid`, `bukuid`) VALUES
(2, 2, 4),
(3, 4, 3),
(4, 4, 5),
(5, 5, 2),
(7, 2, 10),
(8, 2, 1),
(9, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `log_peminjaman`
--

CREATE TABLE `log_peminjaman` (
  `katerangan` varchar(25) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_peminjaman`
--

INSERT INTO `log_peminjaman` (`katerangan`, `waktu`) VALUES
('INSERT TO PEMINJAMAN', '2024-01-23 01:55:14'),
('UPDATE ON Peminjaman', '2024-01-23 01:55:27'),
('DELETE ON Peminjaman', '2024-01-23 01:55:31'),
('INSERT TO PEMINJAMAN', '2024-01-23 07:35:35'),
('UPDATE ON Peminjaman', '2024-01-23 07:36:04'),
('INSERT TO PEMINJAMAN', '2024-01-23 07:44:09'),
('DELETE ON Peminjaman', '2024-01-23 07:45:30'),
('DELETE ON Peminjaman', '2024-01-23 07:46:39'),
('INSERT TO PEMINJAMAN', '2024-01-24 03:31:02'),
('INSERT TO PEMINJAMAN', '2024-01-24 03:31:09'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('UPDATE ON Peminjaman', '2024-01-24 03:53:23'),
('DELETE ON Peminjaman', '2024-01-24 03:53:44'),
('INSERT TO PEMINJAMAN', '2024-01-24 03:58:27'),
('DELETE ON Peminjaman', '2024-01-28 13:02:51'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:03:29'),
('UPDATE ON Peminjaman', '2024-01-28 13:04:50'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:05:25'),
('UPDATE ON Peminjaman', '2024-01-28 13:06:59'),
('UPDATE ON Peminjaman', '2024-01-28 13:06:59'),
('UPDATE ON Peminjaman', '2024-01-28 13:06:59'),
('UPDATE ON Peminjaman', '2024-01-28 13:06:59'),
('UPDATE ON Peminjaman', '2024-01-28 13:06:59'),
('UPDATE ON Peminjaman', '2024-01-28 13:08:19'),
('UPDATE ON Peminjaman', '2024-01-30 07:09:03'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:27:09'),
('DELETE ON Peminjaman', '2024-01-30 07:28:01'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:29:28'),
('DELETE ON Peminjaman', '2024-01-30 07:29:43'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:33:53'),
('DELETE ON Peminjaman', '2024-01-30 07:34:44'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:35:33'),
('DELETE ON Peminjaman', '2024-01-30 07:35:56'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:37:28'),
('DELETE ON Peminjaman', '2024-01-30 07:38:04'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:38:17'),
('DELETE ON Peminjaman', '2024-01-30 07:38:28'),
('INSERT TO PEMINJAMAN', '2024-01-30 07:39:32'),
('UPDATE ON Peminjaman', '2024-01-30 07:50:15'),
('UPDATE ON Peminjaman', '2024-01-30 08:02:33'),
('UPDATE ON Peminjaman', '2024-01-30 08:17:45'),
('UPDATE ON Peminjaman', '2024-01-30 08:17:45'),
('UPDATE ON Peminjaman', '2024-01-30 08:17:51'),
('INSERT TO PEMINJAMAN', '2024-01-30 08:18:02'),
('INSERT TO PEMINJAMAN', '2024-01-31 01:51:22'),
('UPDATE ON Peminjaman', '2024-01-31 01:51:41'),
('INSERT TO PEMINJAMAN', '2024-01-31 02:49:23'),
('UPDATE ON Peminjaman', '2024-01-31 02:49:44'),
('INSERT TO PEMINJAMAN', '2024-02-13 00:53:33'),
('INSERT TO PEMINJAMAN', '2024-02-13 00:53:51'),
('INSERT TO PEMINJAMAN', '2024-02-13 00:54:16'),
('INSERT TO PEMINJAMAN', '2024-02-13 02:28:45'),
('UPDATE ON Peminjaman', '2024-02-13 02:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `kejadian` varchar(25) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`kejadian`, `waktu`) VALUES
('Tambah User', '2024-01-23 01:29:03'),
('Update User', '2024-01-23 01:38:52'),
('Hapus User', '2024-01-23 01:42:05'),
('Tambah User', '2024-01-23 01:43:52'),
('Hapus User', '2024-01-23 01:44:01'),
('Update User', '2024-01-28 13:41:34'),
('Update User', '2024-01-28 13:41:34'),
('Update User', '2024-01-28 13:41:34'),
('Update User', '2024-01-28 13:41:34'),
('Update User', '2024-01-28 13:41:34'),
('Update User', '2024-01-28 13:41:42'),
('Update User', '2024-01-28 13:42:33'),
('Tambah User', '2024-01-28 14:18:34'),
('Tambah User', '2024-01-28 14:22:25'),
('Update User', '2024-01-30 06:37:02'),
('Update User', '2024-01-30 06:37:31'),
('Tambah User', '2024-01-31 02:44:15'),
('Tambah User', '2024-02-07 02:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bukuid` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjamanid`, `userid`, `bukuid`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(2, 4, 3, '2024-01-02', '2024-01-30', 'selesai'),
(3, 5, 2, '2024-01-04', '2024-01-28', 'selesai'),
(4, 4, 5, '2024-01-02', '2024-01-28', 'selesai'),
(5, 2, 4, '2024-01-04', '2024-01-28', 'selesai'),
(7, 4, 1, '2024-01-16', '2024-01-30', 'selesai'),
(10, 2, 12, '2024-01-24', '2024-01-28', 'selesai'),
(28, 2, 10, '2024-01-30', '2024-01-30', 'selesai'),
(29, 2, 1, '2024-01-30', '0000-00-00', 'dipinjam'),
(30, 2, 12, '2024-01-31', '2024-01-31', 'selesai'),
(31, 4, 1, '2024-01-31', '2024-01-31', 'selesai'),
(32, 2, 13, '2024-02-13', '0000-00-00', 'dipinjam'),
(33, 13, 10, '2024-02-13', '2024-02-13', 'selesai'),
(34, 11, 13, '2024-02-13', '0000-00-00', 'dipinjam'),
(35, 13, 12, '2024-02-13', '0000-00-00', 'dipinjam');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `del_pinjam` AFTER DELETE ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman VALUES ('DELETE ON Peminjaman', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman VALUES ('INSERT TO PEMINJAMAN', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembali` AFTER UPDATE ON `peminjaman` FOR EACH ROW UPDATE buku SET stok=stok+1 WHERE bukuid=new.bukuid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku SET stok=stok-1 WHERE bukuid=new.bukuid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd_pinjam` AFTER UPDATE ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman VALUES ('UPDATE ON Peminjaman', now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `ulasanid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bukuid` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`ulasanid`, `userid`, `bukuid`, `ulasan`, `rating`) VALUES
(1, 2, 1, 'Sangat Menghibur', 8),
(2, 2, 4, 'Cukup dramatis dan menghibur', 7),
(3, 4, 3, 'Sangat Menghhibur karna doraemon adalah favoritku', 9),
(4, 4, 5, 'Cukup Menarik', 7),
(5, 5, 2, 'Sangat bermanfaat', 8),
(6, 5, 1, 'Wwkwkwkwwk\r\n', 7),
(7, 4, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sit amet posuere tortor. Aenean non faucibus arcu, a lacinia ligula. Morbi rutrum accumsan velit vitae rhoncus. Quisque vitae pharetra turpis. Suspendisse viverra vestibulum lacinia. Sed congue, velit id accumsan suscipit, dolor risus finibus arcu, sit amet volutpat mauris enim eget lectus. Aliquam id luctus orci, vitae suscipit risus. Donec suscipit consequat lobortis. Sed varius arcu eget quam fringilla laoreet. Ut tempor dui eu lacinia consectetur. Curabitur rutrum, leo sit amet gravida porttitor, orci libero dignissim felis, vitae tristique diam nulla ut elit. Pellentesque ex ante, aliquam et erat vitae, porta euismod libero. In vel suscipit nibh, vitae scelerisque magna. Curabitur tincidunt nunc mattis, commodo elit eget, volutpat mi.', 7),
(8, 2, 13, 'hahaha hitam', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','petugas','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'contoh@gmail.com', 'Super Admin', 'Metro', 'admin'),
(2, 'anggota', '202cb962ac59075b964b07152d234b70', 'anggota@gmail.com', 'Anggota Biasa', 'Metro', 'anggota'),
(3, 'petugas', '202cb962ac59075b964b07152d234b70', 'emailpetugas@gmail.com', 'Seorang Petugas', 'Metro', 'petugas'),
(4, 'anggota02', '202cb962ac59075b964b07152d234b70', 'emailanggota2@gmail.com', 'Seorang Anggota02', 'Metro', 'anggota'),
(5, 'anggota03', '202cb962ac59075b964b07152d234b70', 'emailanggota3@gmail.com', 'Seorang Anggota3', 'Metro', 'anggota'),
(8, 'anggota4', '202cb962ac59075b964b07152d234b70', 'anggota4@gmail.com', 'anggota 04', 'batanghari', 'anggota'),
(11, 'a', '202cb962ac59075b964b07152d234b70', 'a@a', 'a', 'a', 'anggota'),
(12, 'dhani', '202cb962ac59075b964b07152d234b70', 'a@a', 'dhan', 'a', 'anggota'),
(13, 'tengku', '202cb962ac59075b964b07152d234b70', 'tengku@gmail.com', 'tengku de fontaine', 'fontaine', 'anggota'),
(14, 'zayyan', '07e77b04a31033c3191ae84b81e45ec0', 'zayyan@gmail.com', 'zayyan de fontaine', 'metro', 'anggota');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `del_user` AFTER DELETE ON `user` FOR EACH ROW INSERT INTO log_user VALUES ('Hapus User', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_user` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO log_user VALUES('Tambah User',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd_user` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO log_user VALUES ('Update User', now())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuid`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`kategoriid`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`kategoribukuid`),
  ADD KEY `bukuid` (`bukuid`),
  ADD KEY `kategoriid` (`kategoriid`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`ulasanid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `kategoriid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `kategoribukuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `ulasanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`kategoriid`) REFERENCES `kategoribuku` (`kategoriid`) ON DELETE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`);

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
