
DROP PROCEDURE IF EXISTS addArea;
DROP PROCEDURE IF EXISTS addBuilder;
DROP PROCEDURE IF EXISTS addStatusRC;
DROP PROCEDURE IF EXISTS addRC;
DROP PROCEDURE IF EXISTS addHome;
DROP PROCEDURE IF EXISTS addFlat;
DROP PROCEDURE IF EXISTS changeStatusRC;
DROP PROCEDURE IF EXISTS changeStatusFlat;
DROP PROCEDURE IF EXISTS getRCS;
DROP PROCEDURE IF EXISTS getHomes;
DROP PROCEDURE IF EXISTS getFlats;

DELIMITER //

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


CREATE PROCEDURE addFlat(rc_name char(255), home_addr char(255), count_rms int, sqre int, ihb bool, price int, flr int, porches int)
BEGIN
	INSERT INTO `flats` (`count_rooms`, `square`, `balcony`, `stat`) VALUES (count_rms, sqre, ihb, 1);
	INSERT INTO `home_flat` (`id_home`, `id_flat`, price_flat, porch, floor) 
	VALUES (
		(select `id_home` from `rc_home` where `id_home`=(select `id_home` from `homes` where `address`=home_addr) and `id_rc`=(select `id_rc` from `rcs` where `name`=rc_name)),
		(SELECT `id_flat` FROM `flats` ORDER BY `id_flat` DESC LIMIT 1), 
		price, 
		porches, 
		flr
	);
END;

CREATE PROCEDURE changeStatusRC(rc_name char(255), stat char(255))
BEGIN
	UPDATE `rcs` SET `stat`=(SELECT `id_status` FROM `rc_status` WHERE `description`=stat) WHERE `name`=rc_name;
END;

CREATE PROCEDURE changeStatusFlat(rc_name char(255), home_addr char(255), id_flt int, stat char(255))
BEGIN
	UPDATE `flats` SET `stat`=(SELECT `id_status` FROM `flat_status` WHERE `description`=stat) WHERE 
		`id_flat`=(select `id_flat` FROM `home_flat` WHERE `id_flat`=4 AND `id_home`=(select `id_home` from `rc_home` where `id_home`=(select `id_home` from `homes` where `address`=home_addr) and `id_rc`=(select `id_rc` from `rcs` where `name`=rc_name)));
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
	SELECT `count_rooms`, `square`, `balcony`, `porch`, `floor`, `price_flat`, `stat` FROM `flats` f INNER JOIN `home_flat` hf ON f.id_flat=hf.id_flat 
	WHERE `id_home`=(select `id_home` from `rc_home` where `id_home`=(select `id_home` from `homes` where `address`=home_addr) and `id_rc`=(select `id_rc` from `rcs` where `name`=rc_name));
END;

//

DELIMITER ;
