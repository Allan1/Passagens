SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `projeto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `projeto` ;

-- -----------------------------------------------------
-- Table `projeto`.`cities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `state` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `role_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_roles1` (`role_id` ASC) ,
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`role_id` )
    REFERENCES `projeto`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`managers_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`managers_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`managers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`managers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `link` TEXT NOT NULL ,
  `managers_type_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_managers_managers_types1` (`managers_type_id` ASC) ,
  CONSTRAINT `fk_managers_managers_types1`
    FOREIGN KEY (`managers_type_id` )
    REFERENCES `projeto`.`managers_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`shorts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`shorts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `city_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_short_cities1` (`city_id` ASC) ,
  CONSTRAINT `fk_short_cities1`
    FOREIGN KEY (`city_id` )
    REFERENCES `projeto`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`managers_shorts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`managers_shorts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `manager_id` INT NOT NULL ,
  `short_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_managers_shorts_managers1` (`manager_id` ASC) ,
  INDEX `fk_managers_shorts_short1` (`short_id` ASC) ,
  CONSTRAINT `fk_managers_shorts_managers1`
    FOREIGN KEY (`manager_id` )
    REFERENCES `projeto`.`managers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_managers_shorts_short1`
    FOREIGN KEY (`short_id` )
    REFERENCES `projeto`.`shorts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
