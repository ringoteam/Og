SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `og` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `og` ;

-- -----------------------------------------------------
-- Table `og`.`artists`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`artists` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `lastname` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `birthdate` DATETIME NULL ,
  `deathdate` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

INSERT INTO `artists` (`id`, `lastname`, `firstname`, `birthdate`, `deathdate`) VALUES
(1, 'prénom', 'artiste 1', '2008-01-01 00:00:00', '2007-01-01 00:00:00'),
(2, 'ou pas', 'c''est mon prénom', '2007-01-01 00:00:00', '2010-01-01 00:00:00'),
(3, 'dali', 'salvador', '2007-01-01 00:00:00', '2009-01-01 00:00:00');

-- -----------------------------------------------------
-- Table `og`.`productionStatus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`productionStatus` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`artworks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`artworks` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ArtworkName` VARCHAR(45) NOT NULL ,
  `ProductionDate` DATETIME NOT NULL ,
  `artists_id` INT NOT NULL ,
  `ProductID` INT NULL ,
  `Edition` SMALLINT NULL ,
  `EditionNumber` INT NULL ,
  `Region` VARCHAR(80) NULL ,
  `Category` VARCHAR(100) NULL ,
  `MasterArtwork` INT NULL ,
  `productionStatus_id` INT NOT NULL ,
  `gift` INT NULL ,
  `Medium` VARCHAR(100) NULL ,
  `Sizecm` INT NULL ,
  `SizeInch` INT NULL ,
  `Remark` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_artworks_artists`
    FOREIGN KEY (`artists_id` )
    REFERENCES `og`.`artists` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artworks_productionStatus1`
    FOREIGN KEY (`productionStatus_id` )
    REFERENCES `og`.`productionStatus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`purchase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`purchase` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `owner` VARCHAR(100) NULL ,
  `StockFrom` VARCHAR(100) NULL ,
  `StockStatus` INT NULL ,
  `ConsignmentStartDate` DATETIME NULL ,
  `artworks_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `artworks_id`) ,
  CONSTRAINT `fk_purchasse_artworks1`
    FOREIGN KEY (`artworks_id` )
    REFERENCES `og`.`artworks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`civilities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`civilities` (
  `CivilityId` INT NOT NULL ,
  `CivilityName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`CivilityId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`countries`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`countries` (
  `CountryId` INT NOT NULL ,
  `CountryName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`CountryId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`states`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`states` (
  `StateId` INT NOT NULL ,
  `StateName` VARCHAR(45) NOT NULL ,
  `CountryId` INT NOT NULL ,
  PRIMARY KEY (`StateId`) ,
  CONSTRAINT `fk_States_Country`
    FOREIGN KEY (`CountryId` )
    REFERENCES `og`.`countries` (`CountryId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`customers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`customers` (
  `CustomerId` INT NOT NULL AUTO_INCREMENT ,
  `Lastname` VARCHAR(45) NOT NULL ,
  `FirstName` VARCHAR(45) NOT NULL ,
  `Company` VARCHAR(45) NOT NULL ,
  `AdressField1` VARCHAR(45) NOT NULL ,
  `AdressField2` VARCHAR(45) NOT NULL ,
  `ZipCode` VARCHAR(45) NOT NULL ,
  `City` VARCHAR(45) NOT NULL ,
  `PhoneComment` VARCHAR(45) NOT NULL ,
  `Mobile` VARCHAR(45) NOT NULL ,
  `BusinessPhone` VARCHAR(45) NOT NULL ,
  `Fax` VARCHAR(45) NOT NULL ,
  `Email1` VARCHAR(45) NOT NULL ,
  `Email2` VARCHAR(45) NOT NULL ,
  `Email3` VARCHAR(45) NOT NULL ,
  `Remark` VARCHAR(45) NOT NULL ,
  `Title` INT NOT NULL ,
  `Country` INT NOT NULL ,
  `State` INT NOT NULL ,
  PRIMARY KEY (`CustomerId`) ,
  CONSTRAINT `fk_customers_Title`
    FOREIGN KEY (`Title` )
    REFERENCES `og`.`civilities` (`CivilityId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_Country`
    FOREIGN KEY (`Country` )
    REFERENCES `og`.`countries` (`CountryId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_State`
    FOREIGN KEY (`State` )
    REFERENCES `og`.`states` (`StateId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `og`.`fos_user_group`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`fos_user_group` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `roles` LONGTEXT NOT NULL COMMENT '(DC2Type:array)' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `UNIQ_583D1F3E5E237E06` ON `og`.`fos_user_group` (`name` ASC) ;


-- -----------------------------------------------------
-- Table `og`.`fos_user_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`fos_user_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `username_canonical` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `email_canonical` VARCHAR(255) NOT NULL ,
  `enabled` TINYINT(1) NOT NULL ,
  `salt` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `last_login` DATETIME NULL DEFAULT NULL ,
  `locked` TINYINT(1) NOT NULL ,
  `expired` TINYINT(1) NOT NULL ,
  `expires_at` DATETIME NULL DEFAULT NULL ,
  `confirmation_token` VARCHAR(255) NULL DEFAULT NULL ,
  `password_requested_at` DATETIME NULL DEFAULT NULL ,
  `roles` LONGTEXT NOT NULL COMMENT '(DC2Type:array)' ,
  `credentials_expired` TINYINT(1) NOT NULL ,
  `credentials_expire_at` DATETIME NULL DEFAULT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `date_of_birth` DATETIME NULL DEFAULT NULL ,
  `firstname` VARCHAR(64) NULL DEFAULT NULL ,
  `lastname` VARCHAR(64) NULL DEFAULT NULL ,
  `website` VARCHAR(64) NULL DEFAULT NULL ,
  `biography` VARCHAR(255) NULL DEFAULT NULL ,
  `gender` VARCHAR(1) NULL DEFAULT NULL ,
  `locale` VARCHAR(8) NULL DEFAULT NULL ,
  `timezone` VARCHAR(64) NULL DEFAULT NULL ,
  `phone` VARCHAR(64) NULL DEFAULT NULL ,
  `facebook_uid` VARCHAR(255) NULL DEFAULT NULL ,
  `facebook_name` VARCHAR(255) NULL DEFAULT NULL ,
  `facebook_data` LONGTEXT NULL DEFAULT NULL ,
  `twitter_uid` VARCHAR(255) NULL DEFAULT NULL ,
  `twitter_name` VARCHAR(255) NULL DEFAULT NULL ,
  `twitter_data` LONGTEXT NULL DEFAULT NULL ,
  `gplus_uid` VARCHAR(255) NULL DEFAULT NULL ,
  `gplus_name` VARCHAR(255) NULL DEFAULT NULL ,
  `gplus_data` LONGTEXT NULL DEFAULT NULL ,
  `token` VARCHAR(255) NULL DEFAULT NULL ,
  `two_step_code` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `UNIQ_C560D76192FC23A8` ON `og`.`fos_user_user` (`username_canonical` ASC) ;

CREATE UNIQUE INDEX `UNIQ_C560D761A0D96FBF` ON `og`.`fos_user_user` (`email_canonical` ASC) ;

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
(1, 'admin', 'admin', 'admin@example.com', 'admin@example.com', 1, 'mpe1kgfsvfkggcwok0ww0wwc4wkckc0', 'd53tVSrrud+ABqSTBZ6vI731E6iHPVA4G30dNTIllcC3BUSjuBLwO1vOLCBDQOlduvx+pxyR7P2q+A8oC5hX1Q==', '2012-07-30 00:53:31', 0, 0, NULL, '34y5ldm08saocwc0c84g0sw80wkgw4kkws4s04g40gc08ksocc', NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, '2012-07-29 07:44:30', '2012-07-30 00:53:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);

-- -----------------------------------------------------
-- Table `og`.`fos_user_user_group`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`fos_user_user_group` (
  `user_id` INT(11) NOT NULL ,
  `group_id` INT(11) NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  CONSTRAINT `FK_B3C77447FE54D947`
    FOREIGN KEY (`group_id` )
    REFERENCES `og`.`fos_user_group` (`id` ),
  CONSTRAINT `FK_B3C77447A76ED395`
    FOREIGN KEY (`user_id` )
    REFERENCES `og`.`fos_user_user` (`id` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `IDX_B3C77447A76ED395` ON `og`.`fos_user_user_group` (`user_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
