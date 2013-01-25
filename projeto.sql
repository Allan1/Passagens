SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `projeto`.`cities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `state` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `type` VARCHAR(45) NULL ,
  `login` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`managers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`managers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `type` VARCHAR(45) NULL ,
  `link` VARCHAR(250) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto`.`short`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `projeto`.`short` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `abbreviation` VARCHAR(45) NULL ,
  `city_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `city_id`) ,
  INDEX `fk_short_cities_idx` (`city_id` ASC) ,
  CONSTRAINT `fk_short_cities`
    FOREIGN KEY (`city_id` )
    REFERENCES `projeto`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
