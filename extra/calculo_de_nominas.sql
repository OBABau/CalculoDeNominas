-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 01:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calculo_de_nominas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayuda`
--

CREATE TABLE `ayuda` (
  `code` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Descripcion` varchar(164) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ayuda`
--

INSERT INTO `ayuda` (`code`, `Titulo`, `Correo`, `Descripcion`) VALUES
(1, 'Ayuda no puedo iniciar sesion', 'usuario1@example.com', 'Al darle iniciar sesion me dice que la contraseña esta mal pero si esta bien');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`code`, `name`, `description`, `enterprise`, `amount`) VALUES
(1, 'Bono de puntualidad', 'Se paga por llegar a tiempo cada semana', 1, 400),
(2, 'Gratificacion', 'Gratificacion por desempeno', 1, 450),
(3, 'Bono de Productividad', 'Se otorga al concretar 36 puntos en la evaluacion semestral', 1, 5000),
(4, 'prima dominical', 'es la prima dominical', 5, 120);

--
-- Triggers `benefits`
--
DELIMITER $$
CREATE TRIGGER `trg_benefits_insert` AFTER INSERT ON `benefits` FOR EACH ROW BEGIN
    INSERT INTO PROFILE_BENEFITS(benefits, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`code`, `name`, `description`) VALUES
(1, 'ISR', 'El ISR es un impuesto directo que se paga por personas físicas y morales que residen en México o tienen ingresos en México.'),
(2, 'IMSS', 'Es una deduccion por la cual a través de esta los trabajadores obtienen acceso a la atención médica hospitalaria del IMSS.');

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fiscalName` varchar(100) NOT NULL,
  `RFC` char(12) NOT NULL,
  `addressDesc` varchar(100) NOT NULL,
  `CP` char(5) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`code`, `name`, `fiscalName`, `RFC`, `addressDesc`, `CP`, `city`, `state`, `user`) VALUES
(1, 'Axis Development', 'Axis Inc.', 'ADV232005TFT', '9350 Francisco Javier Mina, Zona Urbana Rio', '22010', 'Tijuana', 'Baja California', 4),
(3, 'Empresa Perdomo', 'Kevin', '72347213801', 'Fracc. El Refugio', 'l.dsa', 'Tijuana', 'Baja California', 11),
(4, 'Empresa Perdomo', 'Kevin', '72347213801', 'Fracc. El Refugio', 'l.dsa', 'Tijuana', 'Baja California', 12),
(5, 'TAcos don tono', 'sa de c.v', '76tviyutf754', '8ygviutyfiyvoiujnbpiubgouyfuyitdfyifoiughoiugoiutuytouyitoiu', '87654', 'Tijuana', 'Baja California', 13),
(6, 'TAcos don tono', 'sa de c.v', '76tviyutf754', '8ygviutyfiyvoiujnbpiubgouyfuyitdfyifoiughoiugoiutuytouyitoiu', '22222', 'Tijuana', 'Baja California', 17);

--
-- Triggers `enterprise`
--
DELIMITER $$
CREATE TRIGGER `update_enterprise_code` AFTER INSERT ON `enterprise` FOR EACH ROW BEGIN
    UPDATE user SET enterprise = NEW.code WHERE code = NEW.user;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`code`, `name`, `description`, `enterprise`, `amount`) VALUES
(1, 'Salario tester', 'salario base para el tester', 1, 600),
(2, 'Salario developers', 'salario base para los desarrolladores', 1, 650);

--
-- Triggers `incomes`
--
DELIMITER $$
CREATE TRIGGER `trg_incomes_insert` AFTER INSERT ON `incomes` FOR EACH ROW BEGIN
    INSERT INTO PROFILE_INCOMES(incomes, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `operation` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `expirationDate` varchar(5) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `cardNumber`, `cvv`, `expirationDate`, `user_id`) VALUES
(1, 'Brian Bautista', '1234567891011121', '123', '06/20', 4),
(2, 'Luis Islas Reyes', '1231231244444444', '333', '08/34', 3),
(3, 'Kevin', '0978698765978597', '231', '01/02', 13);

--
-- Triggers `payments`
--
DELIMITER $$
CREATE TRIGGER `after_insert_payment` AFTER INSERT ON `payments` FOR EACH ROW BEGIN
    UPDATE user
    SET active = 1
    WHERE code = NEW.user_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `income` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`code`, `name`, `description`, `enterprise`, `income`) VALUES
(1, 'Tester', 'Sueldo para los testers', 1, 600),
(2, 'Developer', 'El encargado de desarrollar las aplicaciones', 1, 650),
(3, 'Diseñador', 'El encargado de hacer los diseños de la pagina', 1, 625),
(4, 'Profesor', 'perfil para los profesores ', 1, 500),
(5, 'EMPLEADO produccion', 'sdfjsdfjsdfn', 1, 4000),
(6, 'zzzz', 'si', 1, 800),
(7, 'Empleado General', 'Es un empleado de piso', 5, 500);

--
-- Triggers `profile`
--
DELIMITER $$
CREATE TRIGGER `CreateProfileRelationships` AFTER INSERT ON `profile` FOR EACH ROW BEGIN
    

    
    INSERT INTO PROFILE_BENEFITS (benefits, profile, status)
    SELECT B.code, NEW.code, NULL
    FROM BENEFITS B;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_benefits`
--

CREATE TABLE `profile_benefits` (
  `benefits` int(11) DEFAULT NULL,
  `profile` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_benefits`
--

INSERT INTO `profile_benefits` (`benefits`, `profile`, `status`) VALUES
(1, 1, 1),
(1, 2, 0),
(1, 3, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(1, 4, 0),
(2, 4, 0),
(3, 4, 0),
(1, 5, 1),
(2, 5, 1),
(3, 5, 0),
(1, 6, 0),
(2, 6, 0),
(3, 6, 0),
(1, 7, 0),
(2, 7, 0),
(3, 7, 0),
(4, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `code` int(11) NOT NULL,
  `days` int(11) DEFAULT NULL,
  `payDate` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `period` varchar(50) NOT NULL,
  `worker` int(11) DEFAULT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `profile` int(11) DEFAULT NULL,
  `finished` int(1) DEFAULT NULL,
  `sunday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`code`, `days`, `payDate`, `total`, `period`, `worker`, `enterprise`, `profile`, `finished`, `sunday`) VALUES
(1, 10, NULL, 3000, '', 1, 1, 1, 6, NULL),
(2, 2, '2023-11-22', 600, '', 2, 1, 1, 6, 1),
(3, 4, NULL, 1200, '', 3, 1, 1, 6, NULL),
(4, 12, NULL, 3600, '', 1, 1, 1, 6, NULL),
(5, 0, NULL, 0, '', 2, 1, 1, 6, NULL),
(6, 6, NULL, 1800, '', 3, 1, 1, 6, NULL),
(7, 0, NULL, 0, '', 4, 1, 1, 6, NULL),
(11, 0, NULL, 0, '', 1, 1, 1, 5, NULL),
(12, 6, '2023-11-22', 1800, '', 2, 1, 1, 5, 1),
(13, 0, NULL, 0, '', 3, 1, 1, 5, NULL),
(14, 0, NULL, 0, '', 4, 1, 1, 5, NULL),
(18, 10, '2023-11-22', 3000, '', 1, 1, 1, 2, NULL),
(19, 8, '2023-11-22', 2400, '', 2, 1, 1, 2, NULL),
(20, 12, '2023-11-22', 3600, '', 3, 1, 1, 2, NULL),
(21, 0, '2023-11-22', 0, '', 4, 1, 1, 2, NULL),
(25, 12, '2023-11-22', 3600, '', 1, 1, 1, 1, NULL),
(26, 2, '2023-11-22', 600, '', 2, 1, 1, 1, NULL),
(27, 0, '2023-11-22', 0, '', 3, 1, 1, 1, NULL),
(28, 0, '2023-11-22', 0, '', 4, 1, 1, 1, NULL),
(32, 0, '2023-11-22', NULL, '', 1, 1, 1, 0, NULL),
(33, 0, '2023-11-22', NULL, '', 2, 1, 1, 0, 1),
(34, 0, '2023-11-22', NULL, '', 3, 1, 1, 0, NULL),
(35, 0, '2023-11-22', NULL, '', 4, 1, 1, 0, NULL),
(39, 8, '2023-04-07', 15000, '', 2, 1, 1, 16, NULL),
(40, 8, '2024-01-04', 8000, '', 2, 1, 1, 16, NULL),
(41, 52, '2022-12-30', 68000, '', 5, 1, 3, 1, NULL),
(42, 0, NULL, 0, '', 6, 5, 7, 0, NULL),
(43, 0, NULL, 0, '', 7, 5, 7, 0, NULL),
(44, 0, NULL, 0, '', 8, 5, 7, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_benefits`
--

CREATE TABLE `salary_benefits` (
  `benefits` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_benefits`
--

INSERT INTO `salary_benefits` (`benefits`, `salary`, `total`) VALUES
(1, 25, 400),
(2, 26, 450),
(3, 27, 5000),
(3, 1, 5000),
(2, 11, 450),
(1, 18, 400),
(3, 40, 5000),
(4, 43, 120),
(4, 44, 120),
(4, 44, 120),
(4, 44, 120),
(4, 43, 120),
(4, 43, 120),
(4, 43, 120),
(4, 44, 120),
(4, 43, 120),
(4, 43, 120),
(4, 43, 120),
(4, 43, 120);

--
-- Triggers `salary_benefits`
--
DELIMITER $$
CREATE TRIGGER `unique_salary_benefits` BEFORE INSERT ON `salary_benefits` FOR EACH ROW BEGIN
    IF EXISTS (SELECT * FROM salary_benefits WHERE benefits = NEW.benefits AND salary = NEW.salary) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ya existe un registro con esos beneficios y salario.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_deductions`
--

CREATE TABLE `salary_deductions` (
  `deduction` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `code` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `worker` int(11) DEFAULT NULL,
  `hell` tinyint(1) DEFAULT 1,
  `enterprise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`code`, `email`, `password`, `creationDate`, `userType`, `active`, `worker`, `hell`, `enterprise`) VALUES
(1, 'usuario1@example.com', '123', '2023-10-23', 1, NULL, NULL, 1, NULL),
(2, 'usuario2@example.com', '123', '2023-10-23', 2, NULL, NULL, 1, NULL),
(3, 'usuario3@example.com', '123', '2023-10-23', 3, 0, NULL, 1, NULL),
(4, 'axis@axis.com', '123', '2023-11-21', 3, 1, NULL, 1, 1),
(5, 'ernesto.garcia@axis.com', '123', '2023-11-21', 2, NULL, 1, 1, NULL),
(6, 'brian.bautista@axis.com', '123', '2023-11-21', 2, NULL, 2, 1, NULL),
(7, 'alexis.ruelas@axis.com', '123', '2023-11-21', 2, NULL, 3, 0, NULL),
(8, 'luis.islas@axis.com', '123', '2023-11-21', 2, NULL, 4, 1, NULL),
(10, 'daniel.aguilar@axis.com', '123', '2023-11-22', 2, NULL, 5, 0, NULL),
(11, 'todo@gmail.com', '123', '2023-11-28', 3, NULL, NULL, 1, 3),
(12, 'ahora1@gmail.com', '123', '2023-11-28', 3, NULL, NULL, 1, 4),
(13, 'now@gmail.com', '123', '2023-11-28', 3, 1, NULL, 1, 5),
(14, 'charls@gmail.com', '123', '2023-11-28', 2, NULL, 6, 1, NULL),
(15, 'emma@gmail.com', '123', '2023-11-28', 2, NULL, 7, 1, NULL),
(16, 'ang.el@gmail.com', '123', '2023-11-28', 2, NULL, 8, 1, NULL),
(17, 'NEW@GMAIL.COM', '123', '2023-11-28', 3, NULL, NULL, 1, 6);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `trg_worker_insert` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    IF NEW.worker IS NOT NULL THEN
        UPDATE worker
        SET user = NEW.code
        WHERE code = NEW.worker;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`code`, `name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'enterprise');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `lastName2` varchar(30) NOT NULL,
  `RFC` char(13) NOT NULL,
  `NSS` char(11) NOT NULL,
  `CURP` char(18) NOT NULL,
  `number` char(12) NOT NULL,
  `entryDate` date NOT NULL,
  `enterprise` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `profile` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`code`, `name`, `lastName`, `lastName2`, `RFC`, `NSS`, `CURP`, `number`, `entryDate`, `enterprise`, `user`, `profile`, `active`) VALUES
(1, 'Ernesto', 'Garcia', 'Valenzuela', 'GAVE0106AYOXD', '12343338843', 'GAVE010630HBCRLRA8', '6644798476', '2023-11-21', 1, 5, 1, 1),
(2, 'Brian', 'Bautista', 'Ordoñez', 'BAOB040620F77', '02190442455', 'BAOB040620HBCTRRA8', '6642303582', '2023-11-21', 1, 6, 1, 1),
(3, 'Alexis', 'Ruelas', 'Gonzalez', 'RUGA0207011H0', '38701369028', 'RUGC020701HBCLNRA5', '6643227221', '2023-11-21', 1, 7, 1, 1),
(4, 'Luis', 'Islas', 'Reyes', 'ISR0HB328JDM8', '23844483921', 'ISR0HB328JDM823498', '6643725427', '2023-11-21', 1, 8, 1, 1),
(5, 'Daniel', 'Aguilar', 'Ramirez', '123123FJSDFSD', '12390111111', 'ASJDASD8AS90D8AS90', '6656346384', '2023-11-22', 1, 10, 3, 1),
(6, 'Carlos XD', 'Ariel reyes', 'Lopez montoua', 'mskk901922ikw', '10929291019', 'JLYVI786F9786FVOUH', '6657657645', '2023-11-28', 5, 14, 7, 0),
(7, 'Emmanuel', 'Cruz', 'Valenzuela', 'OASBDC3432OIE', '10298731287', 'IOXNCEW2OP89938028', '1234586884', '2023-11-28', 5, 15, 7, 1),
(8, 'Angel', 'Diaz', 'Martinez', 'OINDQOINOJ223', '19231838382', 'NJSWNSJ923IOLKHJ78', '3612786987', '2023-11-28', 5, 16, 7, 1);

--
-- Triggers `worker`
--
DELIMITER $$
CREATE TRIGGER `trg_worker_insert_salary` AFTER INSERT ON `worker` FOR EACH ROW BEGIN
    INSERT INTO salary (days, payDate, total, period, worker, enterprise, profile, finished, sunday)
    VALUES (0, NULL, 0, '', NEW.code, NEW.enterprise, NEW.profile, 0, NULL);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayuda`
--
ALTER TABLE `ayuda`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`code`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

--
-- Indexes for table `profile_benefits`
--
ALTER TABLE `profile_benefits`
  ADD KEY `benefits` (`benefits`),
  ADD KEY `profile` (`profile`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`code`),
  ADD KEY `worker` (`worker`),
  ADD KEY `enterprise` (`enterprise`),
  ADD KEY `profile` (`profile`);

--
-- Indexes for table `salary_benefits`
--
ALTER TABLE `salary_benefits`
  ADD KEY `benefits` (`benefits`),
  ADD KEY `salary` (`salary`);

--
-- Indexes for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD KEY `deduction` (`deduction`),
  ADD KEY `salary` (`salary`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code`),
  ADD KEY `userType` (`userType`),
  ADD KEY `worker` (`worker`),
  ADD KEY `enterprise` (`enterprise`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`),
  ADD KEY `user` (`user`),
  ADD KEY `profile` (`profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayuda`
--
ALTER TABLE `ayuda`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

--
-- Constraints for table `enterprise`
--
ALTER TABLE `enterprise`
  ADD CONSTRAINT `enterprise_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`code`);

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`code`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

--
-- Constraints for table `profile_benefits`
--
ALTER TABLE `profile_benefits`
  ADD CONSTRAINT `profile_benefits_ibfk_1` FOREIGN KEY (`benefits`) REFERENCES `benefits` (`code`),
  ADD CONSTRAINT `profile_benefits_ibfk_2` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`worker`) REFERENCES `worker` (`code`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`),
  ADD CONSTRAINT `salary_ibfk_3` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

--
-- Constraints for table `salary_benefits`
--
ALTER TABLE `salary_benefits`
  ADD CONSTRAINT `salary_benefits_ibfk_1` FOREIGN KEY (`benefits`) REFERENCES `benefits` (`code`),
  ADD CONSTRAINT `salary_benefits_ibfk_2` FOREIGN KEY (`salary`) REFERENCES `salary` (`code`);

--
-- Constraints for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD CONSTRAINT `salary_deductions_ibfk_1` FOREIGN KEY (`deduction`) REFERENCES `deduction` (`code`),
  ADD CONSTRAINT `salary_deductions_ibfk_2` FOREIGN KEY (`salary`) REFERENCES `salary` (`code`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `user_type` (`code`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`worker`) REFERENCES `worker` (`code`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

--
-- Constraints for table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`),
  ADD CONSTRAINT `worker_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`code`),
  ADD CONSTRAINT `worker_ibfk_3` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_salary_finished` ON SCHEDULE EVERY 1 WEEK STARTS '2023-11-13 05:15:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

    update salary as s
    set s.total = (days/2)*(select income from profile where code = s.profile);

    UPDATE salary
    SET finished = finished+1;
    
    INSERT INTO salary (worker, days,payDate, enterprise, profile, finished)
    SELECT code,0,CURRENT_TIMESTAMP, enterprise, profile, 0
    FROM worker;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
