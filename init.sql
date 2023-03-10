CREATE DATABASE IF NOT EXISTS projeto;
USE projeto;
CREATE TABLE `projeto`.`Price` (
  `IdPrice` INT NOT NULL AUTO_INCREMENT,
  `FromPostcode` VARCHAR(50) NOT NULL,
  `ToPostcode` VARCHAR(50) NOT NULL,
  `FromWeight` DECIMAL(3,2) NOT NULL,
  `ToWeight` DECIMAL(3,2) NOT NULL,
  `Cost` DECIMAL(3,2) NOT NULL,
  `InserTime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `UpdateTime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (`IdPrice`));
