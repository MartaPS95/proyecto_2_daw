-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema educalegre_pruebas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema educalegre_pruebas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `educalegre_pruebas` DEFAULT CHARACTER SET utf8 ;
USE `educalegre_pruebas` ;

-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Grupo` (
  `idGrupos` INT NOT NULL,
  `clase` VARCHAR(45) NULL,
  PRIMARY KEY (`idGrupos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Alumno` (
  `idAlumno` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `segundoApellido` VARCHAR(45) NOT NULL,
  `dni` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `titulacion` VARCHAR(45) NULL,
  `Grupo_idGrupos` INT NOT NULL,
  PRIMARY KEY (`idAlumno`),
  UNIQUE INDEX `dni_UNIQUE` (`dni` ASC),
  INDEX `fk_Alumno_Grupo1_idx` (`Grupo_idGrupos` ASC),
  UNIQUE INDEX `Grupo_idGrupos_UNIQUE` (`Grupo_idGrupos` ASC),
  CONSTRAINT `fk_Alumno_Grupo1`
    FOREIGN KEY (`Grupo_idGrupos`)
    REFERENCES `educalegre_pruebas`.`Grupo` (`idGrupos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Profesor` (
  `idProfesor` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `segApellido` VARCHAR(45) NULL,
  `dni` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idProfesor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Profesor_has_Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Profesor_has_Grupo` (
  `Profesor_idProfesor` INT NOT NULL,
  `Grupo_idGrupos` INT NOT NULL,
  PRIMARY KEY (`Profesor_idProfesor`, `Grupo_idGrupos`),
  INDEX `fk_Profesor_has_Grupo_Grupo1_idx` (`Grupo_idGrupos` ASC),
  INDEX `fk_Profesor_has_Grupo_Profesor1_idx` (`Profesor_idProfesor` ASC),
  CONSTRAINT `fk_Profesor_has_Grupo_Profesor1`
    FOREIGN KEY (`Profesor_idProfesor`)
    REFERENCES `educalegre_pruebas`.`Profesor` (`idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Profesor_has_Grupo_Grupo1`
    FOREIGN KEY (`Grupo_idGrupos`)
    REFERENCES `educalegre_pruebas`.`Grupo` (`idGrupos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Modulo` (
  `idModulo` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `codigoOficial` VARCHAR(45) NULL,
  PRIMARY KEY (`idModulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Grupo_has_Modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Grupo_has_Modulo` (
  `Grupo_idGrupos` INT NOT NULL,
  `Modulo_idModulo` INT NOT NULL,
  `añoInicio` VARCHAR(45) NULL,
  `añoFin` VARCHAR(45) NULL,
  PRIMARY KEY (`Grupo_idGrupos`, `Modulo_idModulo`),
  INDEX `fk_Grupo_has_Modulo_Modulo1_idx` (`Modulo_idModulo` ASC),
  INDEX `fk_Grupo_has_Modulo_Grupo1_idx` (`Grupo_idGrupos` ASC),
  CONSTRAINT `fk_Grupo_has_Modulo_Grupo1`
    FOREIGN KEY (`Grupo_idGrupos`)
    REFERENCES `educalegre_pruebas`.`Grupo` (`idGrupos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grupo_has_Modulo_Modulo1`
    FOREIGN KEY (`Modulo_idModulo`)
    REFERENCES `educalegre_pruebas`.`Modulo` (`idModulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Asignaturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Asignaturas` (
  `idAsignaturas` INT NOT NULL,
  `CodigoAsginatura` VARCHAR(45) NULL,
  `Modulo_idModulo` INT NOT NULL,
  `Profesor_idProfesor` INT NOT NULL,
  `Profesor_idProfesor1` INT NOT NULL,
  PRIMARY KEY (`idAsignaturas`, `Modulo_idModulo`, `Profesor_idProfesor`),
  INDEX `fk_Asignaturas_Modulo1_idx` (`Modulo_idModulo` ASC),
  INDEX `fk_Asignaturas_Profesor1_idx` (`Profesor_idProfesor1` ASC),
  CONSTRAINT `fk_Asignaturas_Modulo1`
    FOREIGN KEY (`Modulo_idModulo`)
    REFERENCES `educalegre_pruebas`.`Modulo` (`idModulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Asignaturas_Profesor1`
    FOREIGN KEY (`Profesor_idProfesor1`)
    REFERENCES `educalegre_pruebas`.`Profesor` (`idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `educalegre_pruebas`.`Notas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `educalegre_pruebas`.`Notas` (
  `Alumno_idAlumno` INT NOT NULL,
  `fecha` DATE NULL,
  `tipo` VARCHAR(45) NULL,
  `Asignaturas_idAsignaturas` INT NOT NULL,
  `Asignaturas_Modulo_idModulo` INT NOT NULL,
  `Asignaturas_Profesor_idProfesor` INT NOT NULL,
  PRIMARY KEY (`Alumno_idAlumno`, `Asignaturas_idAsignaturas`, `Asignaturas_Modulo_idModulo`, `Asignaturas_Profesor_idProfesor`),
  INDEX `fk_Notas_Asignaturas1_idx` (`Asignaturas_idAsignaturas` ASC, `Asignaturas_Modulo_idModulo` ASC, `Asignaturas_Profesor_idProfesor` ASC),
  CONSTRAINT `fk_Notas_Alumno1`
    FOREIGN KEY (`Alumno_idAlumno`)
    REFERENCES `educalegre_pruebas`.`Alumno` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notas_Asignaturas1`
    FOREIGN KEY (`Asignaturas_idAsignaturas` , `Asignaturas_Modulo_idModulo` , `Asignaturas_Profesor_idProfesor`)
    REFERENCES `educalegre_pruebas`.`Asignaturas` (`idAsignaturas` , `Modulo_idModulo` , `Profesor_idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
