-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2024 pada 11.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinitepicturee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `cover`, `tanggal_dibuat`, `id_user`) VALUES
(1, 'default_album', 'default_album', '', '0000-00-00', 1234),
(2, 'a', 'a', '1709481501_bbd1e75eab4eb4633eac.jpeg', '0000-00-00', 1),
(3, 'test', 'p', '1709517847_c6a3caafee1e8e18349f.png', '0000-00-00', 18),
(4, 'mobil', 'a', '1709532639_cbe7046cd851f58fc347.jpg', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `albumdata`
--

CREATE TABLE `albumdata` (
  `id_data` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `albumdata`
--

INSERT INTO `albumdata` (`id_data`, `id_album`, `id_foto`, `id_user`) VALUES
(1, 1, 14, 1),
(2, 1, 15, 1),
(4, 1, 16, 1),
(8, 1, 17, 1),
(9, 1, 18, 1),
(10, 1, 19, 18),
(11, 3, 19, 18),
(12, 1, 20, 1),
(13, 1, 21, 1),
(14, 1, 22, 1),
(15, 1, 23, 1),
(16, 1, 24, 21),
(17, 4, 15, 1),
(18, 1, 26, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_unggahan` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggahan`, `lokasi_file`, `id_album`, `id_user`) VALUES
(15, 'Mobil', 'Mobil', '2024-03-03', '1709481891_991e1a237e18f0b649cb.jpeg', 1, 1),
(16, 'Gojo', 'Gojo', '2024-03-03', '1709482387_f6c2ccb5d2c22c89939b.jpg', 1, 1),
(18, 'Ali bin Abi Thalib', 'Ali bin Abi Thalib', '2024-03-03', '1709483530_1b07d29c352a9d26b065.jpg', 1, 1),
(19, 'a', 'a', '2024-03-04', '1709517797_ebb1a2121fbe31fa52da.jpg', 1, 18),
(20, 'Amongus', 'a', '2024-03-04', '1709520019_cbee0ec1213809f357cf.png', 1, 1),
(21, 'Haland', 'a', '2024-03-04', '1709520039_dedc062db742eeb6d40d.jpg', 1, 1),
(22, 'Messi', 's', '2024-03-04', '1709520068_1445f4980c4d8dd393dc.jpg', 1, 1),
(23, 'Gunung', 'a', '2024-03-04', '1709520169_eb195ca43ba92e54dd07.jpg', 1, 1),
(24, 'Apik lek', 'ww', '2024-03-04', '1709520268_9ee3984f866fb1951445.png', 1, 21),
(26, '', 'aaa', '2024-03-04', '1709534489_e31163c1984d00bde2c9.jpg', 1, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `id_komentar` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`id_komentar`, `id_foto`, `id_user`, `isi_komentar`, `tanggal_komentar`) VALUES
(1, 1, 20, 'ha', '0000-00-00'),
(2, 1, 20, 'wkwk', '0000-00-00'),
(3, 1, 21, 'keren bang', '0000-00-00'),
(4, 3, 21, 'gift alok  bang', '0000-00-00'),
(5, 17, 1, 'Haiiii', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`id_like`, `id_foto`, `id_user`, `tanggal_like`) VALUES
(2, 9, 20, '0000-00-00'),
(8, 3, 21, '0000-00-00'),
(9, 1, 21, '0000-00-00'),
(10, 1, 1, '0000-00-00'),
(11, 6, 1, '0000-00-00'),
(12, 4, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `foto`) VALUES
(1, 'husain', '$2y$10$AXBkuh5hSfRkd1kNbI3ztO.Ni9A9xvuDlAKb3rI/9RXULTuHGTC6.', 'agshas@gmail.com', 'Muhammad Husain Syarifuddin', 'ajsakjsjkasjk', 'default.jpg'),
(2, 'husaina', '$2y$10$hlD6awOlpZ4XAtHYG/BPGOQL9kvDF/v1f6SUmxjUzSM74KdisGF66', 'agshas@gmail.com', 'husain', 'ajsakjsjkasjk', 'default.jpg'),
(3, 'husain', '$2y$10$EM6TLwtgHzGBfe1YPrOpIulhcP/Xr6U55RQVVS4ei0A2k4z3DhMQO', 'husain@gmail.com', 'husain', 'jogja', 'default.jpg'),
(4, 'husain', '$2y$10$SlN29aOjuJelvGAQ5qWkXuZz1FifbRTZVPNl63y4MCYj3TAu7X1GW', 'husain@gmail.com', 'husain', 'jogja', 'default.jpg'),
(5, 'sss', '$2y$10$en42q5AVbPPcxoIX2Z89.us87G3MgjLmuC17BA2w7pAN8gsPoLPrS', 'ss@gmail.com', 'sss', 'sss', 'default.jpg'),
(6, 'anton', '$2y$10$vpY5dIduCW/vwyV/pS81KuzUmxlmLxW7ZM0Avinrl4VNAPEXEbhwy', 'anton@gmail.com', 'antonio', 'Yogyakarta', 'default.jpg'),
(7, 'Yantoo', '$2y$10$6V4AEHMTwe8/WOplOflhOe8xmyj.tESfmFLnMT6WNizTd9TH9.v/W', 'yanto@gmail.com', 'Yanto ', 'jogja', 'default.jpg'),
(8, 'sril', '$2y$10$Gd2vpJJrY8Gn7H5vPdVRxuGdSt3VBkVfwErZCJgoHPBc9.sIDc0vG', 'sril@gmail.com', 'sril', 'Banguntapan', 'default.jpg'),
(9, '', '', 'muhrafi829@gmail.com', 'Antonio Simanjutakkkkkk', 'Lempuyangan', '1709128509_1df2a841d0c714d2c03e.jpg'),
(10, 'anton', '', 'muhrafi829@gmail.com', 'Antonioooooo', 'Lempuyangan', '1709128795_44ec2a5c5f3a56449395.jpg'),
(15, 'Husain', '$2y$10$.F1FxXzJWt8f8jzPF80fMe4ydiyy1EgbBFlvBbFDJv7jheBtI0loa', 'husain.sy2005@gmail.com', '', 'Lempuyangan', 'default.jpg'),
(16, 'Husain', '$2y$10$X7Wwa1CoCjJSyD8NY8nRhOTpCpTD.9EEy5GyrFdPvlS0JGMQc1O7S', 'husain.sy2005@gmail.com', 'Muhammad Husain', 'Lempuyangan', 'default.jpg'),
(17, 'sril', '$2y$10$fMpUnz1CRscTxRU2Bhc8NesjyI1LZ40jVqnQxZ.22wosEfuBv2XUi', 'nashrilanam88@gmail.com', '', 'Lempuyangan', 'default.jpg'),
(18, 'sril', '$2y$10$s9y6XMf0hp3JH51Kdpnr6.0NKgbNoEvoItEGQQUqNoEX0tb1tbWBy', 'nashrilanam88@gmail.com', 'sril', 'Lempuyangan', 'default.jpg'),
(20, 'ronald', '$2y$10$YdEyPu.WXFBdMLNdKp5k8e1aV.Bk0Ko0hE1EGNecWyAJgEJK1QxFq', 'anton@gmail.com', 'Ronald Bakery', 'GWAIUdgauda', '1709129380_22964c3dc6c2926846e1.jpg'),
(21, 'prabowo', '$2y$10$5XJNbQ0h23ZwL7tgFn8FjuL3M1aKfFKFJlE9lL6n2fc4pPdbPtFi.', 'prabowo@gmail.com', 'Prabowo Subianto', 'Indonesia', '1709520205_99167673068ab57a66d0.jpg'),
(22, 'prabowo', '$2y$10$XAF8vLMq8QFdISyegXrlAe/XljlSWMMoNIMKsTWCn0zVFy3iMlLBa', 'prabowo@gmail.com', 'Prabowo', 'Indonesia', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `albumdata`
--
ALTER TABLE `albumdata`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_foto` (`id_foto`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `albumdata`
--
ALTER TABLE `albumdata`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
