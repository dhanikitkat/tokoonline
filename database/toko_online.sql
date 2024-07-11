-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2024 pada 05.11
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(4) NOT NULL,
  `gambar_brg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar_brg`) VALUES
(1, 'Bola Basket', 'Spalding GG 7', 'Peralatan Olahraga', 450000, '18', 'Screenshot_770.png'),
(2, 'Bola Voli', 'Mikasa', 'Peralatan Olahraga', 250000, '24', 'bolavoli.jpg'),
(3, 'Sarung Tinju', 'Adisadd', 'Peralatan_Olahraga', 500000, '9', 'sarungtinju.jpg'),
(4, 'Skipping', 'Adisadd', 'Peralatan_Olahraga', 100000, '32', 'skipping.jpg'),
(5, 'Matras', 'Bagus 2 Meteran', 'Peralatan_Olahraga', 95000, '66', 'matras.jpg'),
(6, 'Apple Watch 2023', 'Bagus Apple Punya, garansi 2 th', 'Elektronik', 4000000, '5', 'applewatch.jpg'),
(7, 'Printer Jett', 'Cannon Printer', 'Elektronik', 2500000, '12', 'printer.jpg'),
(8, 'Camera', 'Cannon DSLR 1000MP', 'Elektronik', 6000000, '4', 'camera.jpg'),
(9, 'Baju Plus Celana Pria', 'Baju polos dan celana kotak kotak', 'Pakaian_Pria', 200000, '28', 'set2.jpg'),
(10, 'Kemeja', 'Kemeja Pria Ukuran XXL', 'Pakaian_Pria', 200000, '30', 'kemeja.jpg'),
(11, 'Baju Putih', 'Baju Putih Ukuran XXL', 'Pakaian_Pria', 300000, '55', 'bajuputih.jpg'),
(12, 'Rok Pendek ', 'Ukuran 30', 'Pakaian_Wanita', 150000, '66', 'rok.jpg'),
(13, 'Baju Wanita 1 Set', 'Baju Rok satu set', 'Pakaian_Wanita', 300000, '50', 'wanita.jpg'),
(14, 'Gamis Hijau Wanita', 'Ukuran XXXL', 'Pakaian_Wanita', 400000, '33', 'bajuuu.jpg'),
(15, 'Dress', 'Dress Wanita', 'Pakaian_Wanita', 300000, '12', 'dresss.jpg'),
(16, 'Baju dan Rok Wanita Set 2', '1 Set BAJU putih dan rok', 'Pakaian_Wanita', 350000, '66', 'set.jpg'),
(17, 'Sepatu Gucci Anak', 'Ukuran 25-30', 'Pakaian_Anak', 3000000, '19', 'spatuguci.jpg'),
(18, 'Baju twins', 'Pakaian anak uk 23', 'Pakaian_Anak', 300000, '21', 'twins.jpg'),
(19, 'Dress Gucci Anak', 'Ukuran 30', 'Pakaian_Anak', 600000, '33', 'guccidress.jpg'),
(20, 'Dress Anak Hijau', 'Ukuran 30', 'Pakaian_Anak', 550000, '45', 'dress.jpg'),
(21, 'Mesin Cuci ', 'Mesin Cuci Sanyo', 'Elektronik', 24000000, '11', 'mesincuci.jpg'),
(22, 'Monitor Sumsang', '27Inch', 'Elektronik', 32000000, '22', 'monitor.jpg'),
(23, 'Headset', 'Biru bagus bass besar', 'Elektronik', 300000, '87', 'headset.jpg'),
(25, 'Baju Keren', 'Baju', 'Pakaian_Pria', 500000, '50', 'Screenshot_822.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `no_telp`, `kurir`, `metode_pembayaran`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Muhammad Ramdhani', 'Jl.Wijaya 1 Keroncong Permai EB 6 No.15, Keroncong, Jatiuwung, Tangerang, Banten 15134', 2147483647, 'SiCepat', 'BNI Virtual Account', '2023-03-05 19:20:16', '2023-03-05 19:20:16'),
(2, 'MUHAMMAD RAMDHANI', 'Jl.Wijaya 1 Keroncong Permai EB 6 No.15, Keroncong, Jatiuwung, Tangerang, Banten 15134', 2147483647, 'TIKI', 'BRI Virtual Account', '2023-03-05 20:05:44', '2023-03-05 20:05:44'),
(3, 'MUHAMMAD RAMDHANI', 'Jl.Sukasari 5 Meruya village, meruya, Jakarta Barat', 2147483647, 'JNE', 'BNI Virtual Account', '2023-03-05 20:06:20', '2023-03-05 20:06:20'),
(4, 'Dhani', 'Jakarta', 949482, 'SiCepat', 'BNI Virtual Account', '2023-08-28 11:28:20', '2023-08-28 11:28:20'),
(5, 'ada', 'ada', 0, 'JNE', 'Mandiri Virtual Account', '2024-06-18 14:17:25', '2024-06-18 14:17:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Bola Basket', 1, 450000, ''),
(2, 2, 2, 'Bola Voli', 1, 250000, ''),
(3, 2, 9, 'Baju Plus Celana Pria', 1, 200000, ''),
(4, 2, 3, 'Sarung Tinju', 1, 500000, ''),
(5, 2, 4, 'Skipping', 1, 100000, ''),
(6, 3, 9, 'Baju Plus Celana Pria', 1, 200000, ''),
(7, 4, 17, 'Sepatu Gucci Anak', 2, 3000000, ''),
(8, 4, 1, 'Bola Basket', 4, 450000, ''),
(9, 5, 3, 'Sarung Tinju', 1, 500000, ''),
(10, 5, 2, 'Bola Voli', 1, 250000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'Test User', 'User', '123', 2),
(3, 'Dhani', 'dhani', '123', 2),
(4, 'dhani', 'dhani', 'dhani', 2),
(11, 'Muhammad Ramdhani', 'test', '098f6bcd4621d373cade4e832627b4f6', 2),
(12, 'dhani', 'dani', '55b7e8b895d047537e672250dd781555', 2),
(13, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(14, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
