-- MySQL Script generated by MySQL Workbench
-- Tue 19 Apr 2022 22:32:21 +06
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Band_Database
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Band_Database` ;

-- -----------------------------------------------------
-- Schema Band_Database
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Band_Database` DEFAULT CHARACTER SET utf8mb4 ;
USE `Band_Database` ;

-- -----------------------------------------------------
-- Table `Band_Database`.`USER_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`USER_T` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `zipCode` VARCHAR(45) NULL,
  `country` VARCHAR(45) NOT NULL,
  `subscribedToNewsletter` TINYINT ZEROFILL NOT NULL,
  `joined` DATETIME NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`MERCH_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`MERCH_T` (
  `idMerch` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(300) NULL,
  `imageUrl` VARCHAR(1024) NULL,
  `category` ENUM('other', 'tshirt', 'jacket', 'hat', 'sweatshirt', 'wristband', 'album') NOT NULL,
  `price` DECIMAL(10,2) NULL,
  `stock` INT ZEROFILL NOT NULL,
  `discount` DECIMAL(2,0) ZEROFILL NOT NULL,
  `isAvailable` TINYINT(1) ZEROFILL NOT NULL,
  `isFeatured` TINYINT(1) ZEROFILL NOT NULL DEFAULT 0,
  PRIMARY KEY (`idMerch`))
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `Band_Database`.`CONCERT_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`CONCERT_T` (
  `idConcert` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `description` VARCHAR(300) NULL,
  `location` VARCHAR(75) NULL,
  `schedule` DATETIME NULL,
  `capacity` INT ZEROFILL NOT NULL,
  `imageUrl` VARCHAR(1024) NULL,
  PRIMARY KEY (`idConcert`))
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `Band_Database`.`TICKET_TIER_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`TICKET_TIER_T` (
  `idTicketTier` INT NOT NULL AUTO_INCREMENT,
  `tierName` VARCHAR(45) NOT NULL,
  `tierDescription` VARCHAR(150) NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idTicketTier`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`TICKET_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`TICKET_T` (
  `idTicket` INT NOT NULL AUTO_INCREMENT,
  `idConcert` INT NOT NULL,
  `idUser` INT NOT NULL,
  `comment` VARCHAR(100) NULL,
  `buyDate` DATETIME NOT NULL,
  `idTicketTier` INT NOT NULL,
  PRIMARY KEY (`idTicket`),
  INDEX `fk_TICKET_T_1_idx` (`idConcert` ASC),
  INDEX `fk_TICKET_T_2_idx` (`idUser` ASC),
  INDEX `fk_TICKET_T_3_idx` (`idTicketTier` ASC),
  CONSTRAINT `fk_TICKET_T_1`
    FOREIGN KEY (`idConcert`)
    REFERENCES `Band_Database`.`CONCERT_T` (`idConcert`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TICKET_T_2`
    FOREIGN KEY (`idUser`)
    REFERENCES `Band_Database`.`USER_T` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TICKET_T_3`
    FOREIGN KEY (`idTicketTier`)
    REFERENCES `Band_Database`.`TICKET_TIER_T` (`idTicketTier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`ORDER_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`ORDER_T` (
  `idOrder` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `orderTime` DATETIME NOT NULL,
  `paidStatus` ENUM('PAID', 'UNPAID', 'REFUNDED', 'REFUNDING') NOT NULL,
  `paymentMethod` ENUM('CASH', 'CARD', 'MOBILE') NOT NULL,
  `deliveryStatus` ENUM('PROCESSING', 'ON-TRANSIT', 'DELIVERED') NOT NULL,
  PRIMARY KEY (`idOrder`),
  INDEX `fk_ORDER_T_1_idx` (`idUser` ASC),
  CONSTRAINT `fk_ORDER_T_1`
    FOREIGN KEY (`idUser`)
    REFERENCES `Band_Database`.`USER_T` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`ORDER_ITEM_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`ORDER_ITEM_T` (
  `idMerch` INT NOT NULL,
  `idOrder` INT NOT NULL,
  `quantity` TINYINT(2) ZEROFILL NOT NULL,
  INDEX `fk_PURCHASE_T_1_idx` (`idMerch` ASC),
  INDEX `fk_PURCHASE_T_2_idx` (`idOrder` ASC),
  PRIMARY KEY (`idMerch`, `idOrder`),
  CONSTRAINT `fk_PURCHASE_T_1`
    FOREIGN KEY (`idMerch`)
    REFERENCES `Band_Database`.`MERCH_T` (`idMerch`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PURCHASE_T_2`
    FOREIGN KEY (`idOrder`)
    REFERENCES `Band_Database`.`ORDER_T` (`idOrder`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`CARD_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`CARD_T` (
  `idCard` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `imageUrl` VARCHAR(1024) NULL,
  `heading` VARCHAR(75) NULL,
  `subHeading` VARCHAR(75) NULL,
  `description` VARCHAR(300) NULL,
  `btnStyle` VARCHAR(45) NULL,
  `btnURL` VARCHAR(512) NULL,
  PRIMARY KEY (`idCard`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`SLIDESHOW_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`SLIDESHOW_T` (
  `idSlideshow` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(300) NULL,
  PRIMARY KEY (`idSlideshow`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`SLIDESHOW_CARD_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`SLIDESHOW_CARD_T` (
  `idSlideshow` INT NOT NULL,
  `idCard` INT NOT NULL,
  PRIMARY KEY (`idSlideshow`, `idCard`),
  INDEX `fk_SLIDESHOW_CARD_T_1_idx` (`idCard` ASC),
  CONSTRAINT `fk_SLIDESHOW_CARD_T_1`
    FOREIGN KEY (`idCard`)
    REFERENCES `Band_Database`.`CARD_T` (`idCard`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SLIDESHOW_CARD_T_2`
    FOREIGN KEY (`idSlideshow`)
    REFERENCES `Band_Database`.`SLIDESHOW_T` (`idSlideshow`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Band_Database`.`MESSAGES_T`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Band_Database`.`MESSAGES_T` (
  `idMessages` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NULL,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NULL,
  `email` VARCHAR(100) NOT NULL,
  `subject` VARCHAR(100) NOT NULL,
  `message` VARCHAR(2048) NOT NULL,
  `topic` ENUM('BOOKING', 'QUERY', 'BUSINESS', 'MERCH', 'TICKET', 'OTHER') NOT NULL,
  `receivedTime` DATETIME NOT NULL,
  PRIMARY KEY (`idMessages`),
  INDEX `fk_MESSAGES_T_1_idx` (`idUser` ASC),
  CONSTRAINT `fk_MESSAGES_T_1`
    FOREIGN KEY (`idUser`)
    REFERENCES `Band_Database`.`USER_T` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Band_Database`.`MERCH_T`
-- -----------------------------------------------------
START TRANSACTION;
USE `Band_Database`;
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'T Shirt 1', 'rock our tshirt!', 'images/merch/tshirt-1.png', 'tshirt', 500, 50, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'T Shirt 2', 'rock our tshirt!', 'images/merch/tshirt-2.jpg', 'tshirt', 500, 45, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'T Shirt 3', 'rock our tshirt!', 'images/merch/tshirt-3.webp', 'tshirt', 500, 30, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'T Shirt 4', 'rock our tshirt!', 'images/merch/tshirt-4.webp', 'tshirt', 500, 24, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Sweatshirt 1', 'rock our sweatshirt!', 'images/merch/sweatshirt-1.webp', 'sweatshirt', 700, 20, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Sweatshirt 2', 'rock our sweatshirt!', 'images/merch/sweatshirt-2.jpg', 'sweatshirt', 700, 10, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Sweatshirt 3', 'rock our sweatshirt!', 'images/merch/sweatshirt-3.webp', 'sweatshirt', 700, 5, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Hat 1', 'rock our hat!', 'images/merch/hat-1.jpg', 'hat', 250, 50, 20, 0, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Hat 2', 'rock our hat!', 'images/merch/hat-2.webp', 'hat', 250, 50, 20, 0, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Hat 3', 'rock our hat!', 'images/merch/hat-3.webp', 'hat', 250, 50, 20, 0, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Hat 4', 'rock our hat!', 'images/merch/hat-4.webp', 'hat', 250, 50, 20, 0, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Jacket 1', 'rock our jacket!', 'images/merch/jacket-1.jpg', 'jacket', 900, 23, 0, 1, DEFAULT);
INSERT INTO `Band_Database`.`MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES (DEFAULT, 'Wristband 1', 'rock our wristband!', 'images/merch/wristband-1.jpg', 'wristband', 100, 100, 20, 1, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Band_Database`.`CONCERT_T`
-- -----------------------------------------------------
START TRANSACTION;
USE `Band_Database`;
INSERT INTO `Band_Database`.`CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES (DEFAULT, 'Concert for the Children', 'think of the children!', 'Dhaka, Bangladesh', '2022-06-2 18:00:00', 10000, 'images/concert/concert-1.jpg');
INSERT INTO `Band_Database`.`CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES (DEFAULT, 'Album 3 Tour - India 1', 'south asia tour for album 3', 'Mumbai, India', '2022-05-20 17:00:00', 50000, 'images/concert/concert-2.jpg');
INSERT INTO `Band_Database`.`CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES (DEFAULT, 'Album 3 Tour - India 2', 'south asia tour for album 3', 'New Delhi, India', '2022-05-25 17:00:00', 40000, 'images/concert/concert-3.jpeg');
INSERT INTO `Band_Database`.`CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES (DEFAULT, 'Album 3 Tour - Bangladesh 2', 'south asia tour for album 3', 'Dhaka, Bangladesh', '2022-05-12 17:00:00', 40000, 'images/concert/concert-4.jpg');
INSERT INTO `Band_Database`.`CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES (DEFAULT, 'Album 3 Tour - Bangladesh 1', 'south asia tour for album 3', 'Chittagong, Bangladesh', '2022-05-2 17:00:00', 30000, 'images/concert/concert-5.jpeg');

COMMIT;
