-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2020 pada 09.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unpas_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_akses`
--

CREATE TABLE `tabel_akses` (
  `id_akses` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_akses`
--

INSERT INTO `tabel_akses` (`id_akses`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 2),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_level`
--

CREATE TABLE `tabel_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_level`
--

INSERT INTO `tabel_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(30) NOT NULL,
  `urutan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_menu`
--

INSERT INTO `tabel_menu` (`id_menu`, `menu`, `urutan`) VALUES
(1, 'Admin', 1),
(2, 'User', 2),
(3, 'Menu', 4),
(5, 'Master', 3),
(6, 'Laporan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_submenu`
--

CREATE TABLE `tabel_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `urutan_submenu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_submenu`
--

INSERT INTO `tabel_submenu` (`id_submenu`, `id_menu`, `title`, `url`, `icon`, `aktif`, `urutan_submenu`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 'Yes', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 'Yes', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 'Yes', 2),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 'Yes', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 'Yes', 2),
(6, 1, 'Level Management', 'admin/level', 'fas fa-fw fa-user', 'Yes', 2),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 'Yes', 3),
(11, 1, 'User Management', 'admin/user', 'fas fa-fw fa-users', 'Yes', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `id_level`, `nama_user`, `username`, `email`, `image`, `password`, `aktif`, `date_created`) VALUES
(2, 2, 'User', 'operator', 'user@gmail.com', 'noprofil.png', '$2y$10$RI8uHcSS.QvUe0GG6YxgQ.OmLP4KCERU8RIUP4brKcdtYeofHZWMS', 'Yes', 1597636556),
(3, 1, 'Raksasa Kecil', 'admin', 'ar99.arman@gmail.com', 'arman.jpg', '$2y$10$vnDqHgCPCgCvKSxnIpcAqewpYstC47OdhEKWJ05tO20bpCK/i4ru.', 'Yes', 1597643158);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_akses`
--
ALTER TABLE `tabel_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tabel_level`
--
ALTER TABLE `tabel_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tabel_submenu`
--
ALTER TABLE `tabel_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_akses`
--
ALTER TABLE `tabel_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_level`
--
ALTER TABLE `tabel_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_submenu`
--
ALTER TABLE `tabel_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
