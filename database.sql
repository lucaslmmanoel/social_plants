-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema socialplants
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema socialplants
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socialplants` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema socialplants
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema socialplants
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socialplants` DEFAULT CHARACTER SET latin1 ;
USE `socialplants` ;

-- -----------------------------------------------------
-- Table `socialplants`.`specie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialplants`.`specie` (
  `id_specie` INT NOT NULL AUTO_INCREMENT,
  `name_specie` VARCHAR(45) NULL,
  PRIMARY KEY (`id_specie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialplants`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialplants`.`type` (
  `id_type` INT NOT NULL AUTO_INCREMENT,
  `name_type` VARCHAR(45) NULL,
  `id_specie` INT NOT NULL,
  PRIMARY KEY (`id_type`),
  INDEX `fk_type_specie_idx` (`id_specie` ASC),
  CONSTRAINT `fk_type_specie`
    FOREIGN KEY (`id_specie`)
    REFERENCES `socialplants`.`specie` (`id_specie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `socialplants` ;

-- -----------------------------------------------------
-- Table `socialplants`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialplants`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(250) NULL DEFAULT NULL,
  `favoritePlant` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socialplants`.`plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialplants`.`plant` (
  `id_plant` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `years` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(250) NULL DEFAULT NULL,
  `cares` VARCHAR(100) NULL DEFAULT NULL,
  `id_user` INT(11) NULL,
  `id_specie` INT NOT NULL,
  PRIMARY KEY (`id_plant`, `id_user`),
  INDEX `fk_plant_user_idx` (`id_user` ASC),
  INDEX `fk_plant_specie1_idx` (`id_specie` ASC),
  CONSTRAINT `fk_plant_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `socialplants`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plant_specie1`
    FOREIGN KEY (`id_specie`)
    REFERENCES `socialplants`.`specie` (`id_specie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

insert into specie (name_specie) values ('Orquideas');
insert into specie (name_specie) values ('Suculentas');
insert into specie (name_specie) values ('Samambaia');
insert into specie (name_specie) values ('Pimenteira');
insert into specie (name_specie) values ('Flores Diversas');
insert into specie (name_specie) values ('Outras');

insert into type (name_type,id_specie) values ('Flores','1');
insert into type (name_type,id_specie) values ('Suculentas','2');
insert into type (name_type,id_specie) values ('Ornamentais','3');
insert into type (name_type,id_specie) values ('Comestiveis','4');
insert into type (name_type,id_specie) values ('Flores Diversas','5');
insert into type (name_type,id_specie) values ('Outras','6');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
