DROP DATABASE IF EXISTS `qh`;
CREATE database IF NOT EXISTS `qh` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `qh`;

CREATE TABLE `areas` (
  id_area INT(11) AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL,
  UNIQUE(name)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rcs` (
  id_rc INT(11) AUTO_INCREMENT PRIMARY KEY,
  status INT(11) NOT NULL,
  id_builder INT(11) NOT NULL,
  name CHAR(255) NOT NULL,
  address CHAR(255) NOT NULL,
  UNIQUE(name),
  INDEX(id_rc),
  INDEX(id_builder),
  INDEX(status)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `area_rc` (
  id_rc INT(11) NOT NULL,
  id_area INT(11) NOT NULL,
  INDEX(id_area),
  INDEX(id_rc),
  PRIMARY KEY(id_rc, id_area)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rc_status` (
  id_status INT(11) PRIMARY KEY,
  description CHAR(255) NOT NULL,
  UNIQUE(description),
  INDEX(id_status)
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `rc_status` (`id_status`, `description`) VALUES (1, "Строится");
INSERT INTO `rc_status` (`id_status`, `description`) VALUES (2, "Сдано");

CREATE TABLE `builders` (
  id_builder INT(11) AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL,
  UNIQUE(name)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rc_home` (
  id_rc INT(11) NOT NULL,
  id_home INT(11) NOT NULL,
  INDEX(id_rc),
  INDEX(id_home),
  PRIMARY KEY(id_rc, id_home)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `homes` (
  id_home INT(11) PRIMARY KEY,
  count_floors INT(11) NOT NULL,
  count_proch INT(11) NOT NULL,
  count_flats INT(11) NOT NULL,
  INDEX(id_home)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `flats` (
  id_flat INT(11) PRIMARY KEY,
  count_rooms INT(11) NOT NULL,
  square INT(11) NOT NULL,
  balcony BOOLEAN NOT NULL,
  repair CHAR(255) NOT NULL,
  status INT(11) NOT NULL,
  INDEX(id_flat),
  INDEX(status)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `home_flat` (
  id_home INT(11) NOT NULL,
  id_flat INT(11) NOT NULL,
  price_flat INT(11) NOT NULL,
  porch INT(11) NOT NULL,
  floor INT(11) NOT NULL,
  PRIMARY KEY(id_home, id_flat)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `flat_status` (
  id_status INT(11) PRIMARY KEY,
  description CHAR(255) NOT NULL,
  UNIQUE(description),
  INDEX(id_status)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Связка таблицы "area_rc" с таблицей "areas" */
ALTER TABLE `area_rc` ADD CONSTRAINT area_rc FOREIGN KEY(`id_area`) REFERENCES `areas` (`id_area`) ON UPDATE CASCADE;

/* Связка таблицы "area_rc" с таблицей "rcs" */
ALTER TABLE `area_rc` ADD CONSTRAINT rc_area FOREIGN KEY(`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE;

/* Связка таблицы "area_rc" с таблицей "builders" */
ALTER TABLE `rcs` ADD CONSTRAINT rc_builder FOREIGN KEY(`id_builder`) REFERENCES `builders` (`id_builder`) ON UPDATE CASCADE;

/* Связка таблицы "rc_status" с таблицей "rcs" */
ALTER TABLE `rcs` ADD CONSTRAINT rc_stat FOREIGN KEY(`status`) REFERENCES `rc_status` (`id_status`) ON UPDATE CASCADE;

/* Связка таблицы "rc" с таблицей "rc_home" */
ALTER TABLE `rc_home` ADD CONSTRAINT rc_home FOREIGN KEY(`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE;

/* Связка таблицы "home" с таблицей "rc_home" */
ALTER TABLE `rc_home` ADD CONSTRAINT home_rc FOREIGN KEY(`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE;

/* Связка таблицы "flat" с таблицей "home_flat" */
ALTER TABLE `home_flat` ADD CONSTRAINT home_flat FOREIGN KEY(`id_flat`) REFERENCES `flats` (`id_flat`) ON UPDATE CASCADE;

/* Связка таблицы "home" с таблицей "home_flat" */
ALTER TABLE `home_flat` ADD CONSTRAINT flat_home FOREIGN KEY(`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE;

/* Связка таблицы "flats" с таблицей "flat_status" */
ALTER TABLE `flats` ADD CONSTRAINT flat_status FOREIGN KEY(`status`) REFERENCES `flat_status` (`id_status`) ON UPDATE CASCADE;