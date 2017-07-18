DROP DATABASE IF EXISTS `qh`;
CREATE database IF NOT EXISTS `qh` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `qh`;

CREATE TABLE `areas` (
  id_area INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL UNIQUE,
  CONSTRAINT ac_name CHECK(name <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rcs` (
  id_rc INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  stat INT(11) NOT NULL,
  id_builder INT(11) NOT NULL,
  name CHAR(255) NOT NULL UNIQUE,
  address CHAR(255) NOT NULL,
  INDEX(id_rc),
  INDEX(id_builder),
  INDEX(stat),
  CONSTRAINT rcc_name CHECK(name <> ''),
  CONSTRAINT rcc_address CHECK(address <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `area_rc` (
  id_rc INT(11) NOT NULL,
  id_area INT(11) NOT NULL,
  INDEX(id_area),
  INDEX(id_rc),
  PRIMARY KEY(id_rc, id_area)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rc_status` (
  id_status INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  description CHAR(255) NOT NULL UNIQUE,
  INDEX(id_status)
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `rc_status` (`description`) VALUES ("Строится");
INSERT INTO `rc_status` (`description`) VALUES ("Сдано");

CREATE TABLE `builders` (
  id_builder INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL UNIQUE
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `rc_home` (
  id_rc INT(11) NOT NULL,
  id_home INT(11) NOT NULL,
  INDEX(id_rc),
  INDEX(id_home),
  PRIMARY KEY(id_rc, id_home)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `homes` (
  id_home INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  address CHAR(255) NOT NULL UNIQUE,
  count_floors INT(11) NOT NULL,
  count_proch INT(11) NOT NULL,
  count_flats INT(11) NOT NULL,
  INDEX(id_home)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE `flats` (
  id_flat INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  count_rooms INT(11) NOT NULL,
  number_flat int(11) NOT NULL,
  square INT(11) NOT NULL,
  balcony BOOLEAN NOT NULL,
  stat INT(11) NOT NULL,
  INDEX(id_flat),
  INDEX(stat)
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
  id_status INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  description CHAR(255) NOT NULL UNIQUE,
  INDEX(id_status),
  CONSTRAINT fsc_descp CHECK(description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `flat_status` (`id_status`, `description`) VALUES (1, "Не сдана");
INSERT INTO `flat_status` (`id_status`, `description`) VALUES (2, "Сдана");


CREATE TABLE `inf` (
	id_inf INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_area INT(11) NOT NULL,
	address CHAR(255) NOT NULL UNIQUE,
	INDEX(id_area)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Связка таблицы "area_rc" с таблицей "areas" */
ALTER TABLE `area_rc` ADD CONSTRAINT area_and_rc FOREIGN KEY(`id_area`) REFERENCES `areas` (`id_area`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "area_rc" с таблицей "rcs" */
ALTER TABLE `area_rc` ADD CONSTRAINT rc_area FOREIGN KEY(`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "area_rc" с таблицей "builders" */
ALTER TABLE `rcs` ADD CONSTRAINT rc_builder FOREIGN KEY(`id_builder`) REFERENCES `builders` (`id_builder`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "rc_status" с таблицей "rcs" */
ALTER TABLE `rcs` ADD CONSTRAINT rc_stat FOREIGN KEY(`stat`) REFERENCES `rc_status` (`id_status`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "rc" с таблицей "rc_home" */
ALTER TABLE `rc_home` ADD CONSTRAINT rc_and_home FOREIGN KEY(`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "home" с таблицей "rc_home" */
ALTER TABLE `rc_home` ADD CONSTRAINT home_rc FOREIGN KEY(`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "flat" с таблицей "home_flat" */
ALTER TABLE `home_flat` ADD CONSTRAINT home_and_flat FOREIGN KEY(`id_flat`) REFERENCES `flats` (`id_flat`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "home" с таблицей "home_flat" */
ALTER TABLE `home_flat` ADD CONSTRAINT flat_home FOREIGN KEY(`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "flats" с таблицей "flat_status" */
ALTER TABLE `flats` ADD CONSTRAINT flat_stat FOREIGN KEY(`stat`) REFERENCES `flat_status` (`id_status`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `inf` ADD CONSTRAINT area_inf FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`) ON UPDATE CASCADE ON DELETE CASCADE;

DROP PROCEDURE IF EXISTS addArea;
DROP PROCEDURE IF EXISTS addBuilder;
DROP PROCEDURE IF EXISTS addStatusRC;
DROP PROCEDURE IF EXISTS addRC;
DROP PROCEDURE IF EXISTS addHome;
DROP PROCEDURE IF EXISTS addFlat;
DROP PROCEDURE IF EXISTS changeStatusRC;
DROP PROCEDURE IF EXISTS changeStatusFlat;
DROP PROCEDURE IF EXISTS changePriceFlat;
DROP PROCEDURE IF EXISTS getRCS;
DROP PROCEDURE IF EXISTS getHomes;
DROP PROCEDURE IF EXISTS getFlats;
DROP PROCEDURE IF EXISTS getCountHomes;
DROP PROCEDURE IF EXISTS deleteFlatFromHome;
DROP PROCEDURE IF EXISTS searchFlats;
DROP FUNCTION IF EXISTS isFlatExists;

DELIMITER //

CREATE PROCEDURE searchFlats(count_rooms int, balcony bool, square int, price int)
BEGIN
	select *
	FROM `rcs` r
		INNER JOIN `rc_home` rc ON r.id_rc=rc.id_rc
		INNER JOIN `homes` h ON rc.id_home=h.id_home
		INNER JOIN `home_flat` hf ON h.id_home=hf.id_home
		INNER JOIN `flats` f ON hf.id_flat=f.id_flat
	WHERE f.count_rooms<=count_rooms AND f.balcony=balcony AND f.square<=square AND hf.price_flat<=price
	ORDER BY r.name;
END;

CREATE PROCEDURE addArea(area_name char(255))
BEGIN
	INSERT INTO `areas` (`name`) VALUES (area_name);
END;

CREATE PROCEDURE addBuilder(b_name char(255))
BEGIN
	INSERT INTO `builders` (`name`) VALUES (b_name);
END;

CREATE PROCEDURE addStatusRC(status_name char(255))
BEGIN
	INSERT INTO `rc_status` (`description`) VALUES (`status_name`);
END;

CREATE PROCEDURE addRC(area_name char(255), rc_name char(255), rc_addr char(255), rc_builder char(255), rc_stat int)
BEGIN
	INSERT INTO `rcs` (`name`, `address`, `id_builder`, `stat`) VALUES (rc_name, rc_addr, (SELECT `id_builder` FROM `builders` WHERE `name`=rc_builder), rc_stat);
	INSERT INTO `area_rc` (`id_area`, `id_rc`) VALUES ((SELECT `id_area` FROM `areas` WHERE `name`=area_name), (SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name));
END;

CREATE PROCEDURE addHome(rc_name char(255), addr char(255), count_flts int, count_flrs int, count_prch int)
BEGIN
	INSERT INTO `homes` (`address`, `count_flats`, `count_proch`, `count_floors`) VALUES (addr, count_flts, count_prch, count_flrs);
	INSERT INTO `rc_home` (`id_rc`, `id_home`) VALUES ((SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name), (SELECT `id_home` FROM `homes` WHERE `address`=addr));
END;


CREATE PROCEDURE addFlat(rc_name char(255), home_addr char(255), nf int, count_rms int, sqre int, ihb bool, price int, flr int, porches int)
BEGIN
	INSERT INTO `flats` (`number_flat`, `count_rooms`, `square`, `balcony`, `stat`) VALUES (nf, count_rms, sqre, ihb, 1);
	INSERT INTO `home_flat` (`id_home`, `id_flat`, price_flat, porch, floor) 
	VALUES (
		(select `id_home` from `rc_home` where `id_home`=(select `id_home` from `homes` where `address`=home_addr) and `id_rc`=(select `id_rc` from `rcs` where `name`=rc_name)),
		(SELECT DISTINCT LAST_INSERT_ID() FROM `flats`), 
		price, 
		porches, 
		flr
	);
END;

CREATE PROCEDURE changeStatusRC(rc_name char(255), stat char(255))
BEGIN
	UPDATE `rcs` SET `stat`=(SELECT `id_status` FROM `rc_status` WHERE `description`=stat) WHERE `name`=rc_name;
END;

CREATE PROCEDURE changeStatusFlat(rc_name char(255), home_addr char(255), nf int, stat_flat int)
BEGIN
	UPDATE `flats` 
		INNER JOIN `home_flat` ON flats.id_flat=home_flat.id_flat
		INNER JOIN `rc_home` ON home_flat.id_home=rc_home.id_home
	SET `stat`=stat_flat
		WHERE rc_home.id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name) AND home_flat.id_home=(SELECT `id_home` FROM `homes` WHERE `address`=home_addr) AND  flats.number_flat=nf;
END;

CREATE PROCEDURE changePriceFlat(rc_name char(255), home_addr char(255), nf int, price int)
BEGIN
  UPDATE `home_flat`
		INNER JOIN `flats` ON flats.id_flat=home_flat.id_flat
		INNER JOIN `rc_home` ON home_flat.id_home=rc_home.id_home
	SET `price_flat`=price
		WHERE rc_home.id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name) AND home_flat.id_home=(SELECT `id_home` FROM `homes` WHERE `address`=home_addr) AND  flats.number_flat=nf;
END;

CREATE PROCEDURE getRCS(area_name char(255))
BEGIN
	SELECT * from `all_rcs` WHERE `rc_area_name`=area_name;
END;

CREATE PROCEDURE getHomes(rc_name char(255))
BEGIN
	SELECT `address`, `count_floors`, `count_proch`, `count_flats` FROM `homes` INNER JOIN `rc_home` ON homes.id_home=rc_home.id_home WHERE id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name);
END;

CREATE PROCEDURE getFlats(rc_name char(255), home_addr char(255))
BEGIN
	SELECT `count_rooms`, `number_flat`, `square`, `balcony`, `porch`, `floor`, `price_flat`, `stat` FROM `flats` f INNER JOIN `home_flat` hf ON f.id_flat=hf.id_flat 
	WHERE `id_home`=(select `id_home` from `rc_home` where `id_home`=(select `id_home` from `homes` where `address`=home_addr) and `id_rc`=(select `id_rc` from `rcs` where `name`=rc_name));
END;

CREATE PROCEDURE getCountHomes(rc_name char(255))
BEGIN
	SELECT COUNT(`address`) as count_homes FROM `homes` INNER JOIN `rc_home` ON homes.id_home=rc_home.id_home WHERE rc_home.id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name);
END;

CREATE PROCEDURE deleteFlatFromHome(rc_name char(255), home_addr char(255), nf int)
BEGIN
	DELETE `flats` FROM `flats`
	INNER JOIN `home_flat` ON flats.id_flat=home_flat.id_flat
	INNER JOIN `rc_home` ON home_flat.id_home=rc_home.id_home
		WHERE rc_home.id_rc=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name) AND home_flat.id_home=(SELECT `id_home` FROM `homes` WHERE `address`=home_addr) AND  flats.number_flat=nf;
END;

CREATE FUNCTION isFlatExists(rc_name char(255), home_addr char(255), number_flat int) RETURNS bool
BEGIN
	declare result integer;
	
	select count(flats.`number_flat`) as cf into result from `flats`
	INNER JOIN `home_flat` ON home_flat.id_flat=flats.id_flat
	INNER JOIN `rc_home` ON rc_home.id_home=home_flat.id_home
	WHERE flats.`number_flat`=number_flat AND home_flat.`id_home`=(SELECT `id_home` FROM `homes` WHERE `address`=home_addr) 
	AND rc_home.`id_rc`=(SELECT `id_rc` FROM `rcs` WHERE `name`=rc_name);
	
	IF
		result >= 1
	THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
END;

//

DELIMITER ;

DROP VIEW IF EXISTS all_rcs;

CREATE VIEW all_rcs(rc_name, rc_address, rc_builder, rc_status, rc_text_status, rc_area_name)
as SELECT rcs.name, rcs.address, builders.name, rc_status.id_status, rc_status.description, areas.name FROM `rcs` 
	INNER JOIN `builders` ON rcs.id_builder=builders.id_builder
	INNER JOIN `rc_status` ON rcs.stat=rc_status.id_status
	INNER JOIN `area_rc` ON rcs.id_rc=area_rc.id_rc
	INNER JOIN `areas` ON area_rc.id_area=areas.id_area
	ORDER BY rcs.name;

