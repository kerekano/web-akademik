-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 04:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_tif`
--

CREATE TABLE `absen_tif` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `kehadiran` varchar(255) DEFAULT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ajar_tif`
--

CREATE TABLE `ajar_tif` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) DEFAULT NULL,
  `matkul` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajar_tif`
--

INSERT INTO `ajar_tif` (`id`, `nip`, `matkul`) VALUES
(1, 'IF001', 'IF503'),
(3, 'IF001', 'IF502'),
(4, 'IF001', 'IF301'),
(5, 'IF001', 'IF302');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` varchar(10) NOT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `program_studi` varchar(2) DEFAULT NULL,
  `ikatan_kerja` varchar(255) DEFAULT NULL,
  `aktivitas` varchar(255) DEFAULT NULL,
  `masuk` varchar(4) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `program_studi`, `ikatan_kerja`, `aktivitas`, `masuk`, `img`) VALUES
('IF001', 'Ir. Oesman Hendra Kelana, M.Div, M.Cs', '31', 'Dosen Tetap', 'Aktif Mengajar', '2008', 'if001.jpg'),
('IF002', 'Windra Swastika, Ph.D', '31', 'Dosen Tetap', 'Aktif Mengajar', '2009', 'profile.png'),
('IF003', 'Paulus Lucky Tirma Irawan, S.Kom., MT.', '31', 'Dosen Tetap', 'Aktif Mengajar', '2010', 'profile.png'),
('IF004', 'Dr.Eng. Romy Budhi Widodo', '31', 'Dosen Tetap', 'Aktif Mengajar', '2011', 'profile.png'),
('IF005', 'Mochamad Subianto, S.Kom., M.Cs.', '31', 'Dosen Tetap', 'Aktif Mengajar', '2012', 'profile.png'),
('IF006', 'Hendry Setiawan, ST, M.Kom', '31', 'Dosen Tetap', 'Aktif Mengajar', '2013', 'profile.png'),
('IF007', 'Kestrilia Rega Prilianti, M.Si', '31', 'Dosen Tetap', 'Aktif Mengajar', '2014', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE `id` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `auth` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id`
--

INSERT INTO `id` (`username`, `pass`, `auth`) VALUES
('311610006', '21232f297a57a5a743894a0e4a801fc3', '0'),
('311610010', '21232f297a57a5a743894a0e4a801fc3', '0'),
('311610015', '21232f297a57a5a743894a0e4a801fc3', '0'),
('IF001', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `id_desc`
--

CREATE TABLE `id_desc` (
  `id` int(11) NOT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `img` text NOT NULL,
  `ipk` varchar(4) DEFAULT NULL,
  `id_pa` varchar(5) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `prodi` varchar(2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_desc`
--

INSERT INTO `id_desc` (`id`, `nim`, `nama`, `nama_depan`, `img`, `ipk`, `id_pa`, `sks`, `prodi`, `status`) VALUES
(1, '311610015', 'Reinaldo Sebastian Gunawan', 'Reinaldo', '311610015.jpg', '3', 'IF001', 21, '31', 'Aktif'),
(2, '311610010', 'Kevin Christian Chandra', 'Kevin', '311610010.jpg', '3.2', 'IF001', 22, '31', 'Aktif'),
(3, '311610006', 'Fernandito Yoga Danny', 'Fernandito', 'profile.png', '2.9', 'IF002', 20, '31', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ikutmatkul`
--

CREATE TABLE `ikutmatkul` (
  `ikut_id` int(11) NOT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikutmatkul`
--

INSERT INTO `ikutmatkul` (`ikut_id`, `nim`, `kode_matkul`) VALUES
(56, '311610010', 'IF701'),
(57, '311610015', 'IF502'),
(58, '311610015', 'IF503'),
(59, '311610015', 'IF505');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `jadwal_id` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `jam_mulai` varchar(5) DEFAULT NULL,
  `jam_akhir` varchar(5) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`jadwal_id`, `kode_matkul`, `ruangan`, `jam_mulai`, `jam_akhir`, `hari`) VALUES
(2, 'IF301', 'Sauropus Androgynus', '07.00', '07.40', 'Senin'),
(3, 'IF302', 'Carotenoid', '10.20', '11.00', 'Senin'),
(4, 'IF501', 'Coffe Arabica', '07.00', '07.40', 'Selasa'),
(5, 'IF502', 'Phycosianin', '10.20', '11.00', 'Selasa'),
(6, 'IF503', 'A. Marina', '07.00', '07.40', 'Rabu'),
(7, 'IF504', 'Malus Domestica', '10.20', '11.00', 'Rabu'),
(8, 'IF505', 'Sauropus Androgynus', '07.00', '07.40', 'Kamis'),
(9, 'IF506', 'Lab.Bill Gates', '10.20', '11.00', 'Kamis'),
(10, 'IF701', 'Lab. Kristen Nygaard', '07.00', '07.40', 'Jumat');

-- --------------------------------------------------------

--
-- Table structure for table `krs_temp_tif`
--

CREATE TABLE `krs_temp_tif` (
  `id` int(11) NOT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(255) DEFAULT NULL,
  `program_studi` varchar(2) DEFAULT NULL,
  `periode` varchar(1) DEFAULT NULL,
  `semester` varchar(1) DEFAULT NULL,
  `beban_sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matkul`, `nama_matkul`, `program_studi`, `periode`, `semester`, `beban_sks`) VALUES
('IF301', 'Komunikasi Data', '31', '1', '3', 2),
('IF302', 'Basis Data', '31', '1', '3', 3),
('IF501', 'Pemrograman Web', '31', '1', '5', 3),
('IF502', 'Praktikum Pemrograman Web', '31', '1', '5', 1),
('IF503', 'Dasar Komputer Grafis', '31', '1', '5', 3),
('IF504', 'Sistem Berbasis Pengetahuan', '31', '1', '5', 3),
('IF505', 'Pemrograman Desktop', '31', '1', '5', 3),
('IF506', 'Riset Operasi', '31', '1', '5', 2),
('IF701', 'Pemrograman Mobile', '31', '1', '7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tif`
--

CREATE TABLE `nilai_tif` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `nim` varchar(9) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL,
  `fakultas` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `fakultas`) VALUES
('31', 'Teknik Informatika', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `nama_file` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `kode_matkul`, `judul`, `keterangan`, `nama_file`, `tanggal`) VALUES
(1, 'IF502', 'Pseudocode', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '', '1'),
(2, 'IF502', 'Looping', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '', '2'),
(4, 'IF502', 'lelelele', 'iwak peyek', NULL, '3'),
(8, 'IF301', 'Tugas asdfasdf', 'adsfadsf', NULL, '4'),
(16, 'IF503', 'Tugas SUSAH POL LO', 'AWW', 'Reinaldo_311610015_BI.pdf', '5'),
(17, 'IF503', 'Tugas Aduh susah', 'testing', 'Reinaldo_311610015_BI.pdf', '6'),
(18, 'IF503', 'Tugas Fuzzy Logic', 'Coba coba', 'Reinaldo_311610015_BI.pdf', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_tif`
--
ALTER TABLE `absen_tif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ajar_tif`
--
ALTER TABLE `ajar_tif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `matkul` (`matkul`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id`
--
ALTER TABLE `id`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `id_desc`
--
ALTER TABLE `id_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pa` (`id_pa`),
  ADD KEY `nim` (`nim`),
  ADD KEY `prodi` (`prodi`);

--
-- Indexes for table `ikutmatkul`
--
ALTER TABLE `ikutmatkul`
  ADD PRIMARY KEY (`ikut_id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `krs_temp_tif`
--
ALTER TABLE `krs_temp_tif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matkul`),
  ADD KEY `program_studi` (`program_studi`);

--
-- Indexes for table `nilai_tif`
--
ALTER TABLE `nilai_tif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_tif`
--
ALTER TABLE `absen_tif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ajar_tif`
--
ALTER TABLE `ajar_tif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `id_desc`
--
ALTER TABLE `id_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ikutmatkul`
--
ALTER TABLE `ikutmatkul`
  MODIFY `ikut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `krs_temp_tif`
--
ALTER TABLE `krs_temp_tif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `nilai_tif`
--
ALTER TABLE `nilai_tif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_tif`
--
ALTER TABLE `absen_tif`
  ADD CONSTRAINT `absen_tif_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `ikutmatkul` (`kode_matkul`),
  ADD CONSTRAINT `absen_tif_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `ikutmatkul` (`nim`);

--
-- Constraints for table `ajar_tif`
--
ALTER TABLE `ajar_tif`
  ADD CONSTRAINT `ajar_tif_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `ajar_tif_ibfk_2` FOREIGN KEY (`matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `id_desc`
--
ALTER TABLE `id_desc`
  ADD CONSTRAINT `id_desc_ibfk_1` FOREIGN KEY (`id_pa`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `id_desc_ibfk_2` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `ikutmatkul`
--
ALTER TABLE `ikutmatkul`
  ADD CONSTRAINT `ikutmatkul_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `id_desc` (`nim`),
  ADD CONSTRAINT `ikutmatkul_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `krs_temp_tif`
--
ALTER TABLE `krs_temp_tif`
  ADD CONSTRAINT `krs_temp_tif_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `id_desc` (`nim`),
  ADD CONSTRAINT `krs_temp_tif_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`program_studi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `nilai_tif`
--
ALTER TABLE `nilai_tif`
  ADD CONSTRAINT `nilai_tif_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `ikutmatkul` (`kode_matkul`),
  ADD CONSTRAINT `nilai_tif_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `ikutmatkul` (`nim`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
