SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `og` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `og` ;

-- -----------------------------------------------------
-- Table `og`.`artist`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`artist` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `lastname` VARCHAR(45) NOT NULL ,
  `firstname` VARCHAR(45) NOT NULL ,
  `birthdate` DATETIME NULL ,
  `deathdate` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`productionStatus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`productionStatus` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`artwork`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`artwork` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ArtworkName` VARCHAR(45) NOT NULL ,
  `ProductionDate` DATETIME NOT NULL ,
  `artist_id` INT NOT NULL ,
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
  CONSTRAINT `fk_artwork_artist`
    FOREIGN KEY (`artist_id` )
    REFERENCES `og`.`artist` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artwork_productionStatus1`
    FOREIGN KEY (`productionStatus_id` )
    REFERENCES `og`.`productionStatus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`supplier`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`supplier` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `SupplierName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`country`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`country` (
  `id` INT NOT NULL ,
  `CountryName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`currency`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`currency` (
  `id` INT  NOT NULL AUTO_INCREMENT ,
  `CurrencyName` VARCHAR(45) NULL ,
  `Country` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_currency_country1`
    FOREIGN KEY (`Country` )
    REFERENCES `og`.`country` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`purchase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`purchase` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `owner` VARCHAR(100) NULL ,
  `StockFrom` VARCHAR(100) NULL ,
  `StockStatus` INT NULL ,
  `ConsignmentStartDate` DATETIME NULL ,
  `artwork_id` INT NOT NULL ,
  `ConsignmentEndDate` DATETIME NULL ,
  `PurchaseDate` DATETIME NULL ,
  `PurchaseNumber` VARCHAR(45) NULL ,
  `PurchasePriceHt` INT NULL ,
  `PurchasePriceVat` INT NULL ,
  `Supplier` INT NOT NULL ,
  `PurchasePriceCurrency` INT NOT NULL ,
  PRIMARY KEY (`id`, `artwork_id`) ,
  CONSTRAINT `fk_purchase_artwork1`
    FOREIGN KEY (`artwork_id` )
    REFERENCES `og`.`artwork` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchase_supplier1`
    FOREIGN KEY (`Supplier` )
    REFERENCES `og`.`supplier` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchase_currency1`
    FOREIGN KEY (`PurchasePriceCurrency` )
    REFERENCES `og`.`currency` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`civility`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`civility` (
  `id` INT NOT NULL ,
  `CivilityName` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`state`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`state` (
  `id` INT NOT NULL ,
  `StateName` VARCHAR(45) NOT NULL ,
  `CountryId` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_State_Country`
    FOREIGN KEY (`CountryId` )
    REFERENCES `og`.`country` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `LastName` VARCHAR(45) NOT NULL ,
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
  `CustomerHasMedia` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_customer_Title`
    FOREIGN KEY (`Title` )
    REFERENCES `og`.`civility` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_Country`
    FOREIGN KEY (`Country` )
    REFERENCES `og`.`country` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_State`
    FOREIGN KEY (`State` )
    REFERENCES `og`.`state` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_customer_has_media`
    FOREIGN KEY (`State` )
    REFERENCES `og`.`customer_has_media` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `og`.`customer_has_media`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `og`.`customer_has_media` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `media` INT NOT NULL ,
  `customer` INT NOT NULL ,
  PRIMARY KEY (`id`),
CONSTRAINT `fk_customer_has_media_media`
    FOREIGN KEY (`media` )
    REFERENCES `og`.`media__media` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
CONSTRAINT `fk_customer_has_media_customer`
    FOREIGN KEY (`customer` )
    REFERENCES `og`.`customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

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

