-- -----------------------------------------------------
-- Schema AdmissionsManagement
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `AdmissionsManagement` ;

-- -----------------------------------------------------
-- Schema AdmissionsManagement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AdmissionsManagement` DEFAULT CHARACTER SET utf8 ;
USE `AdmissionsManagement` ;

-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Account` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Account` (
  `username` NVARCHAR(20) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `name` NVARCHAR(45) NULL,
  `phoneNumber` VARCHAR(45) NULL,
  `role` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`username`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`AdmissionsYear`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`AdmissionsYear` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`AdmissionsYear` (
  `idAdmissionsYear` INT NOT NULL AUTO_INCREMENT,
  `valueAdmissionsYear` INT NOT NULL,
  PRIMARY KEY (`idAdmissionsYear`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Majors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Majors` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Majors` (
  `idMajors` INT NOT NULL AUTO_INCREMENT,
  `nameMajors` NVARCHAR(50) NOT NULL,
  `descriptionMajors` NVARCHAR(500) NULL,
  `enabled` INT NOT NULL,
  PRIMARY KEY (`idMajors`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`ExamResult`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`ExamResult` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`ExamResult` (
  `idExamResult` INT NOT NULL AUTO_INCREMENT,
  `nguVan` FLOAT NULL,
  `toan` FLOAT NULL,
  `ngoaiNgu` FLOAT NULL,
  `vatLy` FLOAT NULL,
  `hoaHoc` FLOAT NULL,
  `sinhHoc` FLOAT NULL,
  `lichSu` FLOAT NULL,
  `diaLy` FLOAT NULL,
  `gdcd` FLOAT NULL,
  `diemCong` FLOAT NULL,
  PRIMARY KEY (`idExamResult`));


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`AdmissionsMajor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`AdmissionsMajor` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`AdmissionsMajor` (
  `idAdmissionsYear` INT NOT NULL,
  `idMajors` INT NOT NULL,
  `numberOf` INT NOT NULL COMMENT 'Chỉ tiêu',
  `groups` VARCHAR(45) NOT NULL COMMENT 'tổ hợp xét tuyển',
  `condition` INT NOT NULL COMMENT 'điểm điều kiện',
  INDEX `fk_AdmissionsMajor_AdmissionsYear1_idx` (`idAdmissionsYear` ASC),
  INDEX `fk_AdmissionsMajor_Majors1_idx` (`idMajors` ASC),
  PRIMARY KEY (`idAdmissionsYear`, `idMajors`),
  CONSTRAINT `fk_AdmissionsMajor_AdmissionsYear1`
    FOREIGN KEY (`idAdmissionsYear`)
    REFERENCES `AdmissionsManagement`.`AdmissionsYear` (`idAdmissionsYear`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AdmissionsMajor_Majors1`
    FOREIGN KEY (`idMajors`)
    REFERENCES `AdmissionsManagement`.`Majors` (`idMajors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `AdmissionsManagement`.`Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AdmissionsManagement`.`Application` ;

CREATE TABLE IF NOT EXISTS `AdmissionsManagement`.`Application` (
  `idApplication` INT NOT NULL AUTO_INCREMENT,
  `avatar` LONGTEXT NULL,
  `name` NVARCHAR(50) NOT NULL,
  `gender` INT NOT NULL,
  `birthday` DATE NOT NULL,
  `birthplace` VARCHAR(100) NOT NULL,
  `ethnic` VARCHAR(20) NOT NULL COMMENT 'Dân tộc',
  `identification` VARCHAR(45) NOT NULL COMMENT 'Số CMND',
  `expiration` DATE NOT NULL COMMENT 'Ngày hết hạn',
  `phoneNumber` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `address` VARCHAR(100) NOT NULL,
  `idExamResult` INT NULL,
  `idAdmissionsYear` INT NOT NULL,
  `idMajors` INT NOT NULL,
  PRIMARY KEY (`idApplication`),
  INDEX `fk_Application_ResultExam1_idx` (`idExamResult` ASC),
  INDEX `fk_Application_AdmissionsMajor1_idx` (`idAdmissionsYear` ASC, `idMajors` ASC),
  CONSTRAINT `fk_Application_ResultExam1`
    FOREIGN KEY (`idExamResult`)
    REFERENCES `AdmissionsManagement`.`ExamResult` (`idExamResult`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Application_AdmissionsMajor1`
    FOREIGN KEY (`idAdmissionsYear` , `idMajors`)
    REFERENCES `AdmissionsManagement`.`AdmissionsMajor` (`idAdmissionsYear` , `idMajors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);