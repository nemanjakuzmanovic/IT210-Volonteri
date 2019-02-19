-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 12:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pzit210`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcija`
--

CREATE TABLE `akcija` (
  `id` int(11) NOT NULL,
  `naziv_akcije` varchar(255) NOT NULL,
  `datum_akcije` datetime NOT NULL,
  `opis_akcije` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akcija`
--

INSERT INTO `akcija` (`id`, `naziv_akcije`, `datum_akcije`, `opis_akcije`) VALUES
(1, 'setanje pasa', '2016-06-11 20:00:00', 'Potrebni volonteri za setanje pasa u prihvatilistu za pse. 065-212-2123'),
(2, 'Humanitarna organizacija', '2016-06-11 13:00:00', 'Humanitarna organizacija potrazuje zainteresovane mlade ljude za volonterski rad. 011-2501-112'),
(3, 'Utakmica Srbija-Albanija', '2016-06-15 15:00:00', 'Potrebni volonteri za sakupljanje lopti na utakmici izmedju Srbije i Albanije. Samo punoletne osobe. 011-1212-313'),
(4, 'Zastita zivotne sredine', '2016-06-17 10:00:00', 'Potrebni volonteri za odrzavanje okoline oko Univerziteta Metropolitan. Hrana i pice obezbedjeni, kao i druzenje sa volonterima iz drugih mesta. 011-121-2324'),
(7, 'Jako kul nova akcija', '2016-06-12 20:57:31', 'Kako je samo super ova nova akcija jao');

-- --------------------------------------------------------

--
-- Table structure for table `kontrola`
--

CREATE TABLE `kontrola` (
  `id` int(11) NOT NULL,
  `kontrola_naziv` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrola`
--

INSERT INTO `kontrola` (`id`, `kontrola_naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime_korisnika` varchar(35) NOT NULL,
  `prezime_korisnika` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `kontrola` int(4) NOT NULL,
  `telefon_korisnika` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime_korisnika`, `prezime_korisnika`, `username`, `password`, `kontrola`, `telefon_korisnika`) VALUES
(1, 'Admin', 'Administrator', 'admin', 'admin', 1, '064-admin'),
(2, 'Nemanja', 'Kuzmanovic', 'nomad', 'nomad', 1, '064-9854-155'),
(3, 'Bojan', 'Petrovic', 'bokson', 'bokson', 2, '065-231-3123'),
(4, 'Filip', 'Arsic', 'fico', 'fico', 2, '063-3053-323'),
(5, 'Sava', 'Jeremic', 'savo', 'savo', 2, '066-6463-434'),
(6, 'Jovan', 'Sarac', 'sarac', 'sarac', 2, '066-34690304'),
(7, 'Milan', 'Milanovic', 'miki', 'miki', 2, '060-0420532'),
(8, 'Aleksandra', 'Arsic', 'alex', 'alex', 2, '061-1245677'),
(9, 'Neko', 'Niko', 'no', 'no', 0, '0420402402'),
(10, 'Sasa', 'Matic', 'lesa.ticma', 'sale', 2, '0644564545');

-- --------------------------------------------------------

--
-- Table structure for table `volonteri`
--

CREATE TABLE `volonteri` (
  `id` int(11) NOT NULL,
  `volonter` int(11) NOT NULL,
  `akcija` int(11) NOT NULL,
  `prisustvo` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volonteri`
--

INSERT INTO `volonteri` (`id`, `volonter`, `akcija`, `prisustvo`) VALUES
(1, 3, 1, 1),
(2, 3, 3, 0),
(3, 4, 4, 0),
(4, 4, 3, 0),
(5, 5, 1, 0),
(6, 6, 1, 0),
(7, 6, 2, 0),
(8, 6, 3, 0),
(9, 6, 4, 0),
(10, 7, 2, 0),
(11, 7, 4, 0),
(12, 8, 1, 0),
(13, 8, 2, 0),
(14, 8, 3, 0),
(15, 8, 4, 0),
(16, 4, 5, 0),
(17, 3, 6, 0),
(18, 3, 7, 1),
(19, 4, 7, 0),
(20, 5, 7, 1),
(21, 6, 7, 0),
(22, 7, 7, 0),
(23, 8, 7, 0),
(24, 6, 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akcija`
--
ALTER TABLE `akcija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akcije` (`id`);

--
-- Indexes for table `kontrola`
--
ALTER TABLE `kontrola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volonteri`
--
ALTER TABLE `volonteri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_volontera` (`id`),
  ADD KEY `akcija` (`akcija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akcija`
--
ALTER TABLE `akcija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `volonteri`
--
ALTER TABLE `volonteri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
