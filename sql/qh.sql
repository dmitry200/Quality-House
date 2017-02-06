DROP DATABASE IF EXISTS `qh`;
CREATE database IF NOT EXISTS `qh` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `qh`;

CREATE TABLE `areas` (
  id_area INT(11) AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rcs` (
  id_rc INT(11) AUTO_INCREMENT PRIMARY KEY,
  status INT(11) NOT NULL,
  id_builder INT(11) NOT NULL,
  name CHAR(255) NOT NULL,
  address CHAR(255) NOT NULL,
  UNIQUE(name),
  INDEX(id_rc),
  INDEX(id_builder)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `area_rc` (
  id_rc INT(11) NOT NULL,
  id_area INT(11) NOT NULL,
  INDEX(id_area),
  INDEX(id_rc),
  PRIMARY KEY(id_rc, id_area)
) ENGINE = InnoDB CHARACTER SET = UTF8;







/* Связка таблицы "areas" с таблицей "area_rc" */
ALTER TABLE `areas` ADD CONSTRAINT area_rc FOREIGN KEY(`id_area`) REFERENCES `area_rc` (`id_area`) ON UPDATE CASCADE;

/* Связка таблицы "areas" с таблицей "area_rc" */
ALTER TABLE `rcs` ADD CONSTRAINT rc_area FOREIGN KEY(`id_rc`) REFERENCES `area_rc` (`id_rc`) ON UPDATE CASCADE;