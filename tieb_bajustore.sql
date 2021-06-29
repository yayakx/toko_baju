-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 07:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tieb_bajustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `pw_admin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `pw_admin`) VALUES
(1, ''),
(2, 'bajustore');

-- --------------------------------------------------------

--
-- Table structure for table `data_wa`
--

CREATE TABLE `data_wa` (
  `id_wa` int(11) NOT NULL,
  `no_wa` varchar(60) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_wa`
--

INSERT INTO `data_wa` (`id_wa`, `no_wa`, `pesan`) VALUES
(1, '895600208827', 'Hai, saya sudah melakukan pemesanan di BajuStore. Sebentar lagi akan saya kirim buktri transfernya. Berikut nomor order saya');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(60) NOT NULL,
  `harga_katalog` int(60) NOT NULL,
  `stok_katalog` int(60) NOT NULL,
  `foto_katalog` varchar(60) NOT NULL,
  `deskripsi_katalog` text NOT NULL,
  `jenis_katalog` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `harga_katalog`, `stok_katalog`, `foto_katalog`, `deskripsi_katalog`, `jenis_katalog`) VALUES
(4, 'BAJU RONIN BULAT BLACK TERBAU & TERMURAH', 75000, 12, 'BAJU RONIN BULAT BLACK TERBAU & TERMURAH.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(5, 'BAJU RONIN SAKURA PUTIH MODERN TERBARU & TERMURAH', 75000, 3, 'BAJU RONIN SAKURA PUTIH MODERN TERBARU & TERMURAH.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(6, 'BAJU SAMURAI TERBARU & TERMURAH', 75000, 3, 'BAJU SAMURAI TERBARU & TERMURAH.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(7, 'BAJU TOPI ONE PIECE TERBARU & TERMURAH', 75000, 7, 'BAJU TOPI ONE PIECE TERBARU & TERMURAH.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(8, 'KAOS LUFFY KANTONG', 70000, 9, 'KAOS LUFFY KANTONG.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(9, 'BAJU CHOPPER LARI', 75000, 12, 'BAJU CHOPPER LARI.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(10, 'OT SEPANJANG MASA', 76000, 4, 'OT SEPANJANG MASA.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(11, 'KANJI TRIBAL', 75000, 10, 'KANJI TRIBAL.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(12, 'BAJU RONIN KANJI RED', 75000, 10, 'BAJU RONIN KANJI RED.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(13, 'BAJU BROOK HEAD', 75000, 12, 'BAJU BROOK HEAD.jpg', '(USA Size) M / L / XL .\r\nWarna Tidak Luntur Jahitan Rapi .', 'baju'),
(14, 'House of Cuff', 185000, 7, 'house-of-cuff-3397-7881872-1.jpg', 'chino houseofcuff tersedia mulai dari size 27 (ukuran terkecil) hingga size 38 (ukuran terbesar)', 'celana'),
(15, 'Johnwin', 400000, 10, 'johnwin-2528-7530572-1.jpg', '- Celana Bahan\r\n- Celana Formal\r\n- Double Back Pocket\r\n- Warna Abu\r\n- Bahan Polyester', 'celana'),
(16, 'Raymond Renee Long Pants Slim Fit', 200000, 10, 'raymond-renee-8143-1324852-1.jpg', '- Celana untuk tampilan formal dalam nuansa monokrom\r\n- Warna hitam\r\n- Mid rise\r\n- Unlined\r\n- Slim fit', 'celana'),
(17, 'Hamlin Hamlin Locko Celana Panjang Chino Pria', 150000, 10, 'hamlin-0762-4783472-1.jpg', '- Item Type : Pant\r\n- Gender : Man\r\n- Material : Twill Sweding\r\n- Occassion : Formal\r\n- Slim fit\r\n- Front Button and Zipper Opening', 'celana'),
(18, 'Raymond Renee Long Pants Slim Fit', 145000, 13, 'raymond-renee-3803-2587082-1.jpg', '- Celana desain clean cut untuk smart office look\r\n- Warna abu-abu muda\r\n- Mid rise\r\n- Slim fit\r\n- Kancing dan resleting depan\r\n- Material poliester tidak transparan, ringan, dan tidak', 'celana'),
(20, 'Gianni Visentin Celana Panjang', 200000, 4, 'gianni-visentin-0279-2241731-1.jpg', '- Celana panjang formal desain minimalis\r\n- Hitam\r\n- Mid rise\r\n- Unlined\r\n- Slim fit\r\n- 2 kantong depan', 'celana'),
(21, 'HEMMEH Celana Chinos panjang Hemmeh Abu', 300000, 9, 'hemmeh-7649-9585482-1.jpg', 'Spec:\r\n- Celana Chino Panjang Abu Hemmeh\r\n- Warna Abu\r\n- Unlined\r\n- regurelfit\r\n- 2 Kantong samping dan belakang', 'celana'),
(22, 'TIRAJEANS CHINO PANTS', 230000, 14, 'tirajeans-3305-9669682-1.jpg', '- Long Pants\r\n- Chinos Pants\r\n- Slim Fit\r\n- Material: Cotton Spandex\r\n- Warna: Black', 'celana'),
(23, 'MARKS & SPENCER Regular Fit Twin Pleated Trousers', 120000, 2, 'marks-spencer-8473-2114032-1.jpg', '- Celana formal bernuansa all black untuk office look\r\n- Warna hitam\r\n- Mid rise\r\n- Unlined\r\n- Regular fit\r\n- 2 kantong samping', 'celana'),
(24, 'Gianni Visentin Celana Panjang', 145000, 10, 'gianni-visentin-6443-1685041-1.jpg', '- Celana panjang formal desain shift\r\n- Warna hitam\r\n- Mid rise\r\n- Unlined\r\n- Regular fit\r\n- Kancing dan resleting depan', 'celana'),
(25, 'Manzone Pants Oneil Pant-Black', 345000, 6, 'manzone-5118-9606562-1.jpg', '- Celana Panjang Forma\r\n- Warna Hitam\r\n- Kantong samping\r\n- Regular Fit\r\n- Belt loop\r\n- Material PV Twill Spandex', 'celana'),
(26, 'Crow Crow Akira Basic Trouser Light', 234000, 16, 'crow-8019-9380472-1.jpg', '- Exclusive box packaging\r\n- Warna LIGHT choco\r\n- Slim fit cut\r\n- Expandable waist technology (expand up to 10cm)\r\n- 1 kancing belakang\r\n- YKK Zipper', 'celana'),
(27, 'Crocodile Crocodile Celana Panjang Katun', 269000, 7, 'crocodile-0812-4849642-1.jpg', 'Celana Panjang Bahan Crocodile Original\r\n- Celana cocok untuk pakaian formal ataupun kasual\r\n- Warna Black\r\n- Katun 100%\r\n- Adjustable waist\r\n- 2 kantong samping, 2 kantong belakang dengan', 'celana'),
(28, 'Hush Puppies 013_Brent', 134000, 15, 'hush-puppies-3472-8127512-1.jpg', '- Straight pants bernuansa monokrom untuk formal look\r\n- Warna hitam\r\n- Mid rise\r\n- Unlined\r\n- Regular fit', 'celana');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_session` varchar(99) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_session`, `id_katalog`, `jumlah`) VALUES
(20, 'WkT1lLnBuow0x9vtpLJQDXrL5BZSZCvdzZCGGQPh', 5, 1),
(21, 'WkT1lLnBuow0x9vtpLJQDXrL5BZSZCvdzZCGGQPh', 4, 1),
(24, 'RzkL7BSJ4B3ASgpQd4no7zatNHgpvuyIj6PMehqz', 4, 1),
(25, 'RzkL7BSJ4B3ASgpQd4no7zatNHgpvuyIj6PMehqz', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_session` varchar(99) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `alamat` text NOT NULL,
  `total_harga` int(99) NOT NULL,
  `tanggal` date NOT NULL,
  `status_order` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_session`, `nama`, `alamat`, `total_harga`, `tanggal`, `status_order`) VALUES
(12, 'WkT1lLnBuow0x9vtpLJQDXrL5BZSZCvdzZCGGQPh', 'Auliyaur', 'Sidoarjo', 150000, '2021-06-03', 'pending'),
(13, 'RzkL7BSJ4B3ASgpQd4no7zatNHgpvuyIj6PMehqz', 'Candra', 'Surabaya', 150000, '2021-06-05', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_wa`
--
ALTER TABLE `data_wa`
  ADD PRIMARY KEY (`id_wa`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_wa`
--
ALTER TABLE `data_wa`
  MODIFY `id_wa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
