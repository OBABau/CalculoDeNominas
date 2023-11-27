SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `calculo_de_nomina` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calculo_de_nomina`;

DROP TABLE IF EXISTS `ayuda`;
CREATE TABLE `ayuda` (
  `code` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Descripcion` varchar(164) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `ayuda`;
INSERT INTO `ayuda` (`code`, `Titulo`, `Correo`, `Descripcion`) VALUES
(1, 'Ayuda no puedo iniciar sesion', 'usuario1@example.com', 'Al darle iniciar sesion me dice que la contraseña esta mal pero si esta bien');

DROP TABLE IF EXISTS `benefits`;
CREATE TABLE `benefits` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `benefits`;
INSERT INTO `benefits` (`code`, `name`, `description`, `enterprise`, `amount`) VALUES
(1, 'Bono de puntualidad', 'Se paga por llegar a tiempo cada semana', 1, 400),
(2, 'Gratificacion', 'Gratificacion por desempeno', 1, 450),
(3, 'Bono de Productividad', 'Se otorga al concretar 36 puntos en la evaluacion semestral', 1, 5000);
DROP TRIGGER IF EXISTS `trg_benefits_insert`;
DELIMITER //
CREATE TRIGGER `trg_benefits_insert` AFTER INSERT ON `benefits` FOR EACH ROW BEGIN
    INSERT INTO PROFILE_BENEFITS(benefits, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END
//
DELIMITER ;

DROP TABLE IF EXISTS `deduction`;
CREATE TABLE `deduction` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `deduction`;
INSERT INTO `deduction` (`code`, `name`, `description`) VALUES
(1, 'ISR', 'El ISR es un impuesto directo que se paga por personas físicas y morales que residen en México o tienen ingresos en México.'),
(2, 'IMSS', 'Es una deduccion por la cual a través de esta los trabajadores obtienen acceso a la atención médica hospitalaria del IMSS.');

DROP TABLE IF EXISTS `enterprise`;
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

TRUNCATE TABLE `enterprise`;
INSERT INTO `enterprise` (`code`, `name`, `fiscalName`, `RFC`, `addressDesc`, `CP`, `city`, `state`, `user`) VALUES
(1, 'Axis Development', 'Axis Inc.', 'ADV232005TFT', '9350 Francisco Javier Mina, Zona Urbana Rio', '22010', 'Tijuana', 'Baja California', 4);

DROP TABLE IF EXISTS `incomes`;
CREATE TABLE `incomes` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `incomes`;
INSERT INTO `incomes` (`code`, `name`, `description`, `enterprise`, `amount`) VALUES
(1, 'Salario tester', 'salario base para el tester', 1, 600),
(2, 'Salario developers', 'salario base para los desarrolladores', 1, 650);
DROP TRIGGER IF EXISTS `trg_incomes_insert`;
DELIMITER //
CREATE TRIGGER `trg_incomes_insert` AFTER INSERT ON `incomes` FOR EACH ROW BEGIN
    INSERT INTO PROFILE_INCOMES(incomes, profile, status)
    SELECT NEW.code, P.code, NULL
    FROM PROFILE P
    WHERE P.enterprise = NEW.enterprise;
END
//
DELIMITER ;

DROP TABLE IF EXISTS `operations`;
CREATE TABLE `operations` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `operation` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `operations`;
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `expirationDate` varchar(5) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `payments`;
INSERT INTO `payments` (`id`, `name`, `cardNumber`, `cvv`, `expirationDate`, `user_id`) VALUES
(1, 'Brian Bautista', '1234567891011121', '123', '06/20', 4),
(2, 'Luis Islas Reyes', '1231231244444444', '333', '08/34', 3);
DROP TRIGGER IF EXISTS `after_insert_payment`;
DELIMITER //
CREATE TRIGGER `after_insert_payment` AFTER INSERT ON `payments` FOR EACH ROW BEGIN
    UPDATE user
    SET active = 1
    WHERE code = NEW.user_id;
END
//
DELIMITER ;

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `enterprise` int(11) DEFAULT NULL,
  `income` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `profile`;
INSERT INTO `profile` (`code`, `name`, `description`, `enterprise`, `income`) VALUES
(1, 'Tester', 'Sueldo para los testers', 1, 600),
(2, 'Developer', 'El encargado de desarrollar las aplicaciones', 1, 650),
(3, 'Diseñador', 'El encargado de hacer los diseños de la pagina', 1, 625);
DROP TRIGGER IF EXISTS `CreateProfileRelationships`;
DELIMITER //
CREATE TRIGGER `CreateProfileRelationships` AFTER INSERT ON `profile` FOR EACH ROW BEGIN
    
    INSERT INTO PROFILE_BENEFITS (benefits, profile, status)
    SELECT B.code, NEW.code, NULL
    FROM BENEFITS B;
END
//
DELIMITER ;

DROP TABLE IF EXISTS `profile_benefits`;
CREATE TABLE `profile_benefits` (
  `benefits` int(11) DEFAULT NULL,
  `profile` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `profile_benefits`;
INSERT INTO `profile_benefits` (`benefits`, `profile`, `status`) VALUES
(1, 1, 1),
(1, 2, 0),
(1, 3, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0);

DROP TABLE IF EXISTS `salary`;
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

TRUNCATE TABLE `salary`;
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
(41, 52, '2022-12-30', 68000, '', 5, 1, 3, 1, NULL);

DROP TABLE IF EXISTS `salary_benefits`;
CREATE TABLE `salary_benefits` (
  `benefits` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `salary_benefits`;
INSERT INTO `salary_benefits` (`benefits`, `salary`, `total`) VALUES
(1, 25, 400),
(2, 26, 450),
(3, 27, 5000),
(3, 1, 5000),
(2, 11, 450),
(1, 18, 400),
(3, 40, 5000);

DROP TABLE IF EXISTS `salary_deductions`;
CREATE TABLE `salary_deductions` (
  `deduction` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `salary_deductions`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `code` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `worker` int(11) DEFAULT NULL,
  `hell` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `user`;
INSERT INTO `user` (`code`, `email`, `password`, `creationDate`, `userType`, `active`, `worker`, `hell`) VALUES
(1, 'usuario1@example.com', '123', '2023-10-23', 1, NULL, NULL, 1),
(2, 'usuario2@example.com', '123', '2023-10-23', 2, NULL, NULL, 1),
(3, 'usuario3@example.com', '123', '2023-10-23', 3, 0, NULL, 1),
(4, 'axis@axis.com', '123', '2023-11-21', 3, 1, NULL, 1),
(5, 'ernesto.garcia@axis.com', '123', '2023-11-21', 2, NULL, 1, 1),
(6, 'brian.bautista@axis.com', '123', '2023-11-21', 2, NULL, 2, 1),
(7, 'alexis.ruelas@axis.com', '123', '2023-11-21', 2, NULL, 3, 0),
(8, 'luis.islas@axis.com', '123', '2023-11-21', 2, NULL, 4, 1),
(10, 'daniel.aguilar@axis.com', '123', '2023-11-22', 2, NULL, 5, 0);
DROP TRIGGER IF EXISTS `trg_worker_insert`;
DELIMITER //
CREATE TRIGGER `trg_worker_insert` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    IF NEW.worker IS NOT NULL THEN
        UPDATE worker
        SET user = NEW.code
        WHERE code = NEW.worker;
    END IF;
END
//
DELIMITER ;

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `code` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `user_type`;
INSERT INTO `user_type` (`code`, `name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'enterprise');

DROP TABLE IF EXISTS `worker`;
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

TRUNCATE TABLE `worker`;
INSERT INTO `worker` (`code`, `name`, `lastName`, `lastName2`, `RFC`, `NSS`, `CURP`, `number`, `entryDate`, `enterprise`, `user`, `profile`, `active`) VALUES
(1, 'Ernesto', 'Garcia', 'Valenzuela', 'GAVE0106AYOXD', '12343338843', 'GAVE010630HBCRLRA8', '6644798476', '2023-11-21', 1, 5, 1, 1),
(2, 'Brian', 'Bautista', 'Ordoñez', 'BAOB040620F77', '02190442455', 'BAOB040620HBCTRRA8', '6642303582', '2023-11-21', 1, 6, 1, 1),
(3, 'Alexis', 'Ruelas', 'Gonzalez', 'RUGA0207011H0', '38701369028', 'RUGC020701HBCLNRA5', '6643227221', '2023-11-21', 1, 7, 1, 1),
(4, 'Luis', 'Islas', 'Reyes', 'ISR0HB328JDM8', '23844483921', 'ISR0HB328JDM823498', '6643725427', '2023-11-21', 1, 8, 1, 1),
(5, 'Daniel', 'Aguilar', 'Ramirez', '123123FJSDFSD', '12390111111', 'ASJDASD8AS90D8AS90', '6656346384', '2023-11-22', 1, 10, 3, 1);


ALTER TABLE `ayuda`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `benefits`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

ALTER TABLE `deduction`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`code`),
  ADD KEY `user` (`user`);

ALTER TABLE `incomes`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

ALTER TABLE `operations`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `profile`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`);

ALTER TABLE `profile_benefits`
  ADD KEY `benefits` (`benefits`),
  ADD KEY `profile` (`profile`);

ALTER TABLE `salary`
  ADD PRIMARY KEY (`code`),
  ADD KEY `worker` (`worker`),
  ADD KEY `enterprise` (`enterprise`),
  ADD KEY `profile` (`profile`);

ALTER TABLE `salary_benefits`
  ADD KEY `benefits` (`benefits`),
  ADD KEY `salary` (`salary`);

ALTER TABLE `salary_deductions`
  ADD KEY `deduction` (`deduction`),
  ADD KEY `salary` (`salary`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`code`),
  ADD KEY `userType` (`userType`),
  ADD KEY `worker` (`worker`);

ALTER TABLE `user_type`
  ADD PRIMARY KEY (`code`);

ALTER TABLE `worker`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enterprise` (`enterprise`),
  ADD KEY `user` (`user`),
  ADD KEY `profile` (`profile`);


ALTER TABLE `ayuda`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `benefits`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `deduction`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `enterprise`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `incomes`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `operations`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `profile`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `salary`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `user`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `user_type`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `worker`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

ALTER TABLE `enterprise`
  ADD CONSTRAINT `enterprise_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`code`);

ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`code`);

ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`);

ALTER TABLE `profile_benefits`
  ADD CONSTRAINT `profile_benefits_ibfk_1` FOREIGN KEY (`benefits`) REFERENCES `benefits` (`code`),
  ADD CONSTRAINT `profile_benefits_ibfk_2` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`worker`) REFERENCES `worker` (`code`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`),
  ADD CONSTRAINT `salary_ibfk_3` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

ALTER TABLE `salary_benefits`
  ADD CONSTRAINT `salary_benefits_ibfk_1` FOREIGN KEY (`benefits`) REFERENCES `benefits` (`code`),
  ADD CONSTRAINT `salary_benefits_ibfk_2` FOREIGN KEY (`salary`) REFERENCES `salary` (`code`);

ALTER TABLE `salary_deductions`
  ADD CONSTRAINT `salary_deductions_ibfk_1` FOREIGN KEY (`deduction`) REFERENCES `deduction` (`code`),
  ADD CONSTRAINT `salary_deductions_ibfk_2` FOREIGN KEY (`salary`) REFERENCES `salary` (`code`);

ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `user_type` (`code`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`worker`) REFERENCES `worker` (`code`);

ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`enterprise`) REFERENCES `enterprise` (`code`),
  ADD CONSTRAINT `worker_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`code`),
  ADD CONSTRAINT `worker_ibfk_3` FOREIGN KEY (`profile`) REFERENCES `profile` (`code`);

DELIMITER //
DROP EVENT IF EXISTS `update_salary_finished`//
CREATE DEFINER=`root`@`localhost` EVENT `update_salary_finished` ON SCHEDULE EVERY 1 WEEK STARTS '2023-11-13 05:15:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

    update salary as s
    set s.total = (days/2)*(select income from profile where code = s.profile);

    UPDATE salary
    SET finished = finished+1;
    
    INSERT INTO salary (worker, days,payDate, enterprise, profile, finished)
    SELECT code,0,CURRENT_TIMESTAMP, enterprise, profile, 0
    FROM worker;
END//

DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
