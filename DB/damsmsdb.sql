-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `username`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Doctor` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Doctor`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 141561395, 'Rajesh Kaur', 989, 'raj@gmail.com', '2022-11-12', '12:41:00', '2', 2, 'Thanks', '2022-11-10 06:11:50', 'Cancelled due to incorrect mobile number', 'Cancelled', '2022-11-10 12:40:35'),
(2, 499219152, 'Mukesh Yadav', 7977797979, 'mukesh@gmail.com', '2022-11-13', '12:30:00', '2', 2, 'bmnbmngfugwakJDiowhfdgr', '2022-11-10 07:08:58', 'Your appointment has been approved, kindly came at mention time', 'Approved', '2022-11-10 12:34:41'),
(3, 485109480, 'Tina Yadav', 4654564464, 'tina@gmail.com', '2022-11-11', '13:00:00', '1', 1, 'bjnbjh', '2022-11-10 12:08:51', 'Appointment request has been approved', 'Approved', '2022-11-10 14:32:29'),
(4, 611388102, 'Jyoti', 7897987987, 'jyoti@gmail.com', '2022-11-12', '02:00:00', '1', 1, 'Thanks', '2022-11-10 14:31:17', NULL, NULL, NULL),
(5, 607441873, 'Anuj kumar', 1425362514, 'anujkkk@hmak.com', '2022-11-16', '20:50:00', '1', 1, 'NA', '2022-11-11 01:19:37', 'Approved', 'Approved', '2024-03-18 23:03:43'),
(6, 667282012, 'Rahul', 1425251414, 'rk@gmail.com', '2022-11-15', '18:31:00', '2', 2, 'NA', '2022-11-11 01:48:52', 'Approved', 'Approved', '2022-11-11 07:24:25'),
(7, 599829368, 'Anita', 4563214563, 'anta@test.com', '2022-11-25', '15:20:00', '2', 2, 'NA', '2022-11-11 01:49:54', 'approved', 'Approved', '2024-03-18 23:03:04'),
(8, 940019123, 'Amit Kumar', 1425362514, 'amitkr123@test.com', '2022-11-15', '12:30:00', '13', 4, 'NA', '2022-11-11 01:56:17', 'Your appointment has been approved.', 'Approved', '2022-11-11 01:56:55'),
(9, 606027321, 'Navod Tharu', 778797654, 'world@gmail.com', '2024-03-21', '11:00:00', '2', 5, '', '2024-03-09 17:26:47', 'Accepted', 'Approved', '2024-03-09 17:27:43'),
(10, 103033184, 'Thesandu', 745487965, 'thesandu@gmail.com', '2024-03-15', '13:30:00', '2', 5, '', '2024-03-09 17:52:10', 'accepted', 'Approved', '2024-03-09 17:52:36'),
(11, 412748067, 'admin bro', 78754546, 'adabro@gmail.com', '2024-03-30', '14:00:00', '13', 6, '', '2024-03-09 20:31:31', 'Accepted\r\n', 'Approved', '2024-03-09 20:32:33'),
(12, 598461312, 'Nike Black ', 778797654, 'navod@gmail.com', '2024-03-13', '10:00:00', '2', 5, '', '2024-03-11 15:59:56', NULL, NULL, NULL),
(13, 112167042, 'admin', 745487965, 'navod@gmail.com', '2024-03-21', '07:00:00', '2', 5, '', '2024-03-11 19:37:12', NULL, NULL, NULL),
(14, 986834302, 'Test Three', 764578795, 'testthree@gmail.com', '2024-03-29', '10:00:00', '1', 8, '', '2024-03-16 17:23:54', NULL, NULL, NULL),
(15, 856660950, 'Test four', 787976452, 'testfour@gmail.com', '2024-03-31', '07:30:00', '5', 5, 'Hey...testing', '2024-03-16 17:26:18', 'Cancelled', 'Cancelled', '2024-03-18 23:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointmentid`
--

CREATE TABLE `tblappointmentid` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointmentid`
--

INSERT INTO `tblappointmentid` (`AppointmentID`, `PatientID`) VALUES
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblappointmentp`
--

CREATE TABLE `tblappointmentp` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Test` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Message` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Status` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `patientID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointmentp`
--

INSERT INTO `tblappointmentp` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Test`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`, `patientID`) VALUES
(24, 641819438, 'Tharushan', 747879765, 'tharushakasthuriarachchi@gmail.com', '2024-03-28', '12:00:00', '6', '', '2024-03-18 14:18:21', NULL, NULL, NULL, NULL),
(25, 411973742, 'Tharushan', 747879765, 'tharushakasthuriarachchi@gmail.com', '2024-03-28', '12:00:00', '2', '', '2024-03-18 14:28:04', NULL, NULL, NULL, NULL),
(26, 528336073, 'Tharusha Navod', 745487965, 'Tharu@gmail.com', '2024-03-30', '10:00:00', '4', '', '2024-03-23 09:08:41', NULL, NULL, NULL, NULL),
(27, 185215609, 'Tharusha Navod', 747879765, 'navod@gmail.com', '2024-03-29', '11:00:00', '3', '', '2024-03-23 09:11:01', NULL, NULL, NULL, NULL),
(28, 836996159, 'Tharusha Navod', 787545789, 'tharushakasthuriarachchi@gmail.com', '2024-03-28', '14:00:00', '5', '', '2024-03-23 09:11:46', NULL, NULL, NULL, NULL),
(29, 753960597, 'Tharusha Navod', 784564131, 'hsdgvfasgvfyh@gmail.com', '2024-03-28', '22:00:00', '1', '', '2024-03-23 09:13:25', NULL, NULL, NULL, NULL),
(30, 869542546, 'Jeffry Bruno', 787976452, 'jeff@gmail.com', '2024-03-29', '14:00:00', '7', '', '2024-03-23 09:27:57', NULL, NULL, NULL, NULL),
(31, 974374830, 'Tharusha', 745487965, 'world@gmail.com', '2024-03-30', '10:00:00', '4', '', '2024-03-23 10:37:24', NULL, NULL, NULL, NULL),
(32, 714151655, 'Tharusha', 747879765, 'Tharu1@gmail.com', '2024-03-30', '22:00:00', '8', '', '2024-03-23 10:42:44', NULL, NULL, NULL, NULL),
(33, 367417814, 'admin', 784564131, 'anu@gmail.com', '2024-03-29', '09:00:00', '8', '', '2024-03-23 10:43:30', NULL, NULL, NULL, NULL),
(34, 472417471, 'Nike Black Go', 747879765, 'anu@gmail.com', '2024-03-28', '10:00:00', '8', '', '2024-03-23 10:45:06', NULL, NULL, NULL, NULL),
(35, 745024392, 'Nike Black Go', 747879765, 'hgjfk@gmail.com', '2024-03-28', '10:00:00', '8', '', '2024-03-23 10:47:10', NULL, NULL, NULL, NULL),
(36, 291038047, 'Nike Black Go', 747879765, 'hgjfk@gmail.com', '2024-03-28', '10:00:00', '3', '', '2024-03-23 10:49:14', NULL, NULL, NULL, NULL),
(37, 769721247, 'Nike Black Go', 764578795, 'Tharu1@gmail.com', '2024-03-30', '06:00:00', '2', '', '2024-03-23 11:20:09', NULL, NULL, NULL, NULL),
(38, 581124757, 'ysegfshfg', 78797654, 'gsge@gmial.com', '2024-03-29', '09:00:00', '7', '', '2024-03-23 12:34:21', NULL, NULL, NULL, 1),
(39, 585174505, 'vfvvgvf', 764578795, 'Tharu1@gmail.com', '2024-03-30', '09:00:00', '3', '', '2024-03-23 12:35:04', NULL, NULL, NULL, 1),
(40, 602938806, 'Tharusha', 745487965, 'world@gmail.com', '2024-03-29', '10:00:00', '3', '', '2024-03-23 12:41:58', NULL, NULL, NULL, 1),
(41, 362538275, 'Hello world ', 747879765, 'tharushakasthuriarachchi@gmail.com', '2024-03-30', '14:00:00', '7', '', '2024-03-23 14:34:36', NULL, NULL, NULL, 1),
(42, 386322935, 'admin', 747879765, 'tharushakasthuriarachchi@gmail.com', '2024-03-29', '22:00:00', '8', '', '2024-03-23 14:36:57', NULL, NULL, NULL, 1),
(43, 122669290, 'admin', 747879765, 'tharushakasthuriarachchi@gmail.com', '2024-03-29', '22:00:00', '8', '', '2024-03-23 14:41:31', NULL, NULL, NULL, 1),
(44, 829627838, 'Tharusha', 745487965, 'Tharu1@gmail.com', '2024-03-29', '10:00:00', '3', '', '2024-03-23 15:03:14', NULL, NULL, NULL, 1),
(45, 801487092, 'Hello world', 787976541, 'hellohello@gmail.com', '2024-03-25', '13:00:00', '4', '', '2024-03-24 03:40:44', NULL, NULL, NULL, 1),
(46, 395483926, 'Tharusha', 764578795, 'Tharu@gmail.com', '2024-03-26', '10:00:00', '3', '', '2024-03-24 22:06:12', NULL, NULL, NULL, 1),
(47, 872088421, 'Navod Tharusha', 745487965, 'ntharu@gmail.com', '2024-03-26', '13:00:00', '3', '', '2024-03-25 05:40:21', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(259) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`ID`, `FullName`, `MobileNumber`, `Email`, `Specialization`, `Password`, `CreationDate`) VALUES
(1, 'Dr. Anusakha Singh', 9787979798, 'anu@gmail.com', '1', 'f925916e2754e5e03f75dd58a5733251', '2022-11-09 15:01:11'),
(2, 'Dr. Pradeep Chauhan', 6464654646, 'pra@gmail.com', '2', '202cb962ac59075b964b07152d234b70', '2022-11-09 15:01:59'),
(3, 'Garima Singh', 14253625, 'gs123@test.com', '7', 'f925916e2754e5e03f75dd58a5733251', '2022-11-11 01:28:44'),
(4, 'Shiv Kumar Singh', 1231231230, 'skmr123@test.com', '4', 'f925916e2754e5e03f75dd58a5733251', '2022-11-11 01:54:44'),
(5, 'Dr.Tharusha Navod', 774546498, 'Tharu@gmail.com', '5', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-09 10:39:44'),
(6, 'Dr.Navod Kasthuriarachchi', 774546465, 'navod@gmail.com', '13', 'aaa2ae7f592260298344f5dc353a8bcf', '2024-03-09 20:30:02'),
(7, 'Dr.Tharu Kasthuriarachchi', 774546465, '12345@gmail.com', '13', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-11 19:10:47'),
(8, 'Dr.Kanthi Jayasingha', 774547878, 'kanthi@gmail.com', '1', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-14 15:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Our mission declares our purpose of existence as a company and our objectives.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>To give every customer much more than what he/she asks for in terms of quality, selection, value for money and customer service, by understanding local tastes and preferences and innovating constantly to eventually provide an unmatched experience in jewellery shopping.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '132 B High Level Rd, Nugegoda 10250', 'ABC@gmail.com', 94325456987, NULL, '09:00 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Password` varchar(259) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `CreationDate`) VALUES
(1, 'Tharusha Navod', 774546465, 'world@gmail.com', '8a793cca50d65b970f6be98de1a2f099', '2024-03-12 16:13:10'),
(2, 'Navod', 778589865, 'navod@gmail.com', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-15 22:09:03'),
(3, 'Testing one', 774546465, 'testingone@gmail.com', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-16 13:51:32'),
(4, 'Jeffry Bruno', 747579823, 'jeff@gmail.com', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-23 09:16:16'),
(5, 'Tharusha Navod', 774546498, 'Tharu@gmail.com', '7bff80b0d959597aa4d16b6e402e798d', '2024-03-24 18:25:32'),
(8, 'Tharusha Navod', 774546465, 'Tharu123@gmail.com', 'd874dab659a2a239d54f0b6f142fc7c0', '2024-03-24 18:42:33'),
(9, 'th', 774546123, 'Tharu14@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2024-03-24 18:59:34'),
(10, 'Tharusha Navod', 774546465, 'world12@gmail.com', '973d98ac221d7e433fd7c417aa41027a', '2024-03-24 19:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `filesize` varchar(11) NOT NULL,
  `filetype` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `test` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `patient` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `appointmentnumber` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`id`, `filename`, `filesize`, `filetype`, `upload_date`, `test`, `patient`, `appointmentnumber`) VALUES
(8, 'docdb.PNG', '45038', 'image/png', '0000-00-00 00:00:00', '6', '1', NULL),
(9, 'docdb.PNG', '45038', 'image/png', '2024-03-22 09:24:08', '5', '1', NULL),
(10, 'wallpaperflare.com_wallpaper (1).jpg', '1343060', 'image/jpeg', '2024-03-22 10:02:22', '8', '', 0),
(11, 'docdb.png', '45038', 'image/png', '2024-03-22 10:03:33', '3', '', 0),
(12, 'docdb.png', '45038', 'image/png', '2024-03-22 10:04:15', '5', '', 0),
(13, 'docdb.png', '45038', 'image/png', '2024-03-22 10:05:04', '5', '4', 0),
(14, 'docdb.png', '45038', 'image/png', '2024-03-22 10:05:14', '3', '3', 0),
(15, 'docdb.png', '45038', 'image/png', '2024-03-22 10:08:50', '5', '1', 3),
(16, 'santa-claus-full-1920x1080-13307.png', '143117', 'image/png', '2024-03-22 13:32:01', '6', '2', 16),
(17, 'black-panther-minimal-art-marvel-superheroes-purple-7680x4320-4247.jpg', '6006749', 'image/jpeg', '2024-03-22 15:14:47', '4', '1', 4),
(18, 'Cat-Wallpaper-For-PC.jpg', '295833', 'image/jpeg', '2024-03-23 11:59:50', '1', '3', 25),
(19, 'cats-moon-pink-silhouette-black-background-1920x1080-978.png', '207827', 'image/png', '2024-03-23 13:24:07', '4', '1', 714151655),
(20, 'img2.wallspic.com-beard-album_cover-fictional_character-art-portrait-2700x1518.jpg', '1844220', 'image/jpeg', '2024-03-24 22:42:10', '8', '1', 185215609);

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblspecialization`
--

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES
(1, 'Orthopedics', '2022-11-09 14:22:33'),
(2, 'Internal Medicine', '2022-11-09 14:23:42'),
(3, 'Obstetrics and Gynecology', '2022-11-09 14:24:14'),
(4, 'Dermatology', '2022-11-09 14:24:42'),
(5, 'Pediatrics', '2022-11-09 14:25:06'),
(6, 'Radiology', '2022-11-09 14:25:31'),
(7, 'General Surgery', '2022-11-09 14:25:52'),
(8, 'Ophthalmology', '2022-11-09 14:27:18'),
(9, 'Family Medicine', '2022-11-09 14:27:52'),
(10, 'Chest Medicine', '2022-11-09 14:28:32'),
(11, 'Anesthesia', '2022-11-09 14:29:12'),
(12, 'Pathology', '2022-11-09 14:29:51'),
(13, 'ENT', '2022-11-09 14:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbltechnician`
--

CREATE TABLE `tbltechnician` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Password` varchar(259) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltechnician`
--

INSERT INTO `tbltechnician` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `CreationDate`) VALUES
(1, 'Tharusha Navod', 774546498, 'Tharu1@gmail.com', 'e500d8aee73d8dba7bcb4cfc10d0b038', NULL),
(2, 'Testing one', 774546498, 'testingone@gmail.com', 'e500d8aee73d8dba7bcb4cfc10d0b038', '2024-03-16 19:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbltests`
--

CREATE TABLE `tbltests` (
  `ID` int(5) NOT NULL,
  `Test` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltests`
--

INSERT INTO `tbltests` (`ID`, `Test`, `price`) VALUES
(1, '[FBC – Full Blood Count]', 1250),
(2, '[ESR – Erythrocyte Sedimentation Rate]', 1500),
(3, '[CRP – C-Reactive Protein]', 1800),
(4, '[HbA1c – Haemoglobin A1c]', 2000),
(5, '[HDL – High-Density Lipoprotein]', 1950),
(6, '[INR – International Normalised Ratio]', 2500),
(7, '[PSA – Prostate Specific Antigen]', 2100),
(8, '[TSH – Thyroid Stimulating Hormone]', 1200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointmentid`
--
ALTER TABLE `tblappointmentid`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `tblappointmentp`
--
ALTER TABLE `tblappointmentp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltechnician`
--
ALTER TABLE `tbltechnician`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltests`
--
ALTER TABLE `tbltests`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblappointmentid`
--
ALTER TABLE `tblappointmentid`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblappointmentp`
--
ALTER TABLE `tblappointmentp`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbltechnician`
--
ALTER TABLE `tbltechnician`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltests`
--
ALTER TABLE `tbltests`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblappointmentid`
--
ALTER TABLE `tblappointmentid`
  ADD CONSTRAINT `tblappointmentid_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `tblpatient` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
