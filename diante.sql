-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 04:31 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diante`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `ID` int(20) NOT NULL,
  `Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Phone_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Email_Address` varchar(250) COLLATE utf8_bin NOT NULL,
  `Profile_Picture` varchar(250) COLLATE utf8_bin NOT NULL,
  `Driver_licence_ID` varchar(250) COLLATE utf8_bin NOT NULL,
  `Car_Licence_ID` varchar(250) COLLATE utf8_bin NOT NULL,
  `Lack_Of_Judgment_File` varchar(250) COLLATE utf8_bin NOT NULL,
  `Car_Plat_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Car_Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Longitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `Latitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `Password` varchar(250) COLLATE utf8_bin NOT NULL,
  `Verification_Code` varchar(250) COLLATE utf8_bin NOT NULL,
  `Avalability_Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Total_Rate` int(20) NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`ID`, `Name`, `Phone_Number`, `Email_Address`, `Profile_Picture`, `Driver_licence_ID`, `Car_Licence_ID`, `Lack_Of_Judgment_File`, `Car_Plat_Number`, `Car_Type`, `Longitude`, `Latitude`, `Password`, `Verification_Code`, `Avalability_Status`, `Total_Rate`, `Status`, `Add_Date_Time`) VALUES
(4, '', '', '', 'Drivers_Info/logo.png', 'Drivers_Info/logo.png', 'Drivers_Info/logo.png', 'Drivers_Info/logo.png', '123456', 'Test', '35.8383616', '31.962726399999998', '', '3735', 'True', 0, 'Active', '2020-01-16 15:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `drivers_rates`
--

CREATE TABLE `drivers_rates` (
  `ID` int(20) NOT NULL,
  `Driver_ID` int(20) NOT NULL,
  `User_ID` int(20) NOT NULL,
  `Rate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(20) NOT NULL,
  `Location_Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Driver_ID` int(20) NOT NULL,
  `User_ID` int(20) NOT NULL,
  `Package_ID` int(20) NOT NULL,
  `Vehicle_ID` int(20) NOT NULL,
  `Picture_File` varchar(250) COLLATE utf8_bin NOT NULL,
  `Start_Longitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `Start_Latitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `End_Longitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `End_Latitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `End_Longitude_2` varchar(250) COLLATE utf8_bin NOT NULL,
  `End_Latitude_2` varchar(250) COLLATE utf8_bin NOT NULL,
  `Date` varchar(250) COLLATE utf8_bin NOT NULL,
  `Start_Time` varchar(250) COLLATE utf8_bin NOT NULL,
  `End_Time` varchar(250) COLLATE utf8_bin NOT NULL,
  `Estimation_Time` varchar(250) COLLATE utf8_bin NOT NULL,
  `Total_KM_Distance` varchar(250) COLLATE utf8_bin NOT NULL,
  `Total_Price` varchar(250) COLLATE utf8_bin NOT NULL,
  `Users_Notes` varchar(250) COLLATE utf8_bin NOT NULL,
  `Driver_Rate_Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Location_Type`, `Driver_ID`, `User_ID`, `Package_ID`, `Vehicle_ID`, `Picture_File`, `Start_Longitude`, `Start_Latitude`, `End_Longitude`, `End_Latitude`, `End_Longitude_2`, `End_Latitude_2`, `Date`, `Start_Time`, `End_Time`, `Estimation_Time`, `Total_KM_Distance`, `Total_Price`, `Users_Notes`, `Driver_Rate_Status`, `Status`, `Add_Date_Time`) VALUES
(18, 'Two Locations', 4, 1, 1, 1, 'Packages_Pictures/logo.png', '35.834289606359874', '31.970225251514165', '35.83394628360597', '31.966620977933943', '35.83862405612794', '31.967713196992143', '2020-01-16', '17:13:18', '17:22:41', '9 Minutes', '2', '40.822', 'test notes', '', 'Finish', '2020-01-16 15:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `ID` int(20) NOT NULL,
  `Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`ID`, `Type`, `Price`) VALUES
(1, 'Small Package - 50cm x 150cm', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `Name` varchar(250) COLLATE utf8_bin NOT NULL,
  `Phone_Number` varchar(250) COLLATE utf8_bin NOT NULL,
  `Email_Address` varchar(250) COLLATE utf8_bin NOT NULL,
  `Password` varchar(250) COLLATE utf8_bin NOT NULL,
  `Longitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `Latitude` varchar(250) COLLATE utf8_bin NOT NULL,
  `Penlty_Balance` varchar(250) COLLATE utf8_bin NOT NULL,
  `Verification_Code` varchar(250) COLLATE utf8_bin NOT NULL,
  `Status` varchar(250) COLLATE utf8_bin NOT NULL,
  `Total_Rate` varchar(250) COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Phone_Number`, `Email_Address`, `Password`, `Longitude`, `Latitude`, `Penlty_Balance`, `Verification_Code`, `Status`, `Total_Rate`, `Add_Date_Time`) VALUES
(1, 'Ameer', '', '', '', '35.8328734', '31.971790699999996', '0', '7773', 'Active', '5', '2020-01-16 15:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `users_rates`
--

CREATE TABLE `users_rates` (
  `ID` int(20) NOT NULL,
  `Driver_ID` int(20) NOT NULL,
  `User_ID` int(20) NOT NULL,
  `Rate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users_rates`
--

INSERT INTO `users_rates` (`ID`, `Driver_ID`, `User_ID`, `Rate`) VALUES
(1, 4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `ID` int(20) NOT NULL,
  `Type` varchar(250) COLLATE utf8_bin NOT NULL,
  `Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`ID`, `Type`, `Price`) VALUES
(1, 'Diana - 2 meters x 5 meters', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `drivers_rates`
--
ALTER TABLE `drivers_rates`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Driver_ID` (`Driver_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Driver_ID_3` (`Driver_ID`),
  ADD KEY `User_ID_3` (`User_ID`),
  ADD KEY `Package_ID` (`Package_ID`),
  ADD KEY `Vehicle_ID` (`Vehicle_ID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_rates`
--
ALTER TABLE `users_rates`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Driver_ID` (`Driver_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers_rates`
--
ALTER TABLE `drivers_rates`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_rates`
--
ALTER TABLE `users_rates`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers_rates`
--
ALTER TABLE `drivers_rates`
  ADD CONSTRAINT `Driver_ID` FOREIGN KEY (`Driver_ID`) REFERENCES `drivers` (`ID`),
  ADD CONSTRAINT `User_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Driver_ID_3` FOREIGN KEY (`Driver_ID`) REFERENCES `drivers` (`ID`),
  ADD CONSTRAINT `Package_ID` FOREIGN KEY (`Package_ID`) REFERENCES `packages` (`ID`),
  ADD CONSTRAINT `User_ID_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `Vehicle_ID` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
