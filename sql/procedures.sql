
DROP PROCEDURE IF EXISTS addBuilder;
DROP PROCEDURE IF EXISTS addStatusRC;
DROP PROCEDURE IF EXISTS addRC;
DROP PROCEDURE IF EXISTS addHome;
DROP PROCEDURE IF EXISTS addFlat;

DELIMITER //

CREATE PROCEDURE addBuilder(b_name char(255))
BEGIN
	INSERT INTO `builders` (`name`) VALUES (b_name);
END;

CREATE PROCEDURE addStatusRC(status_name char(255))
BEGIN
	INSERT INTO `rc_status` (`description`) VALUES (`status_name`);
END;

CREATE PROCEDURE addRC(rc_name char(255), rc_addr char(255), rc_builder char(255))
BEGIN
	INSERT INTO `rcs` (`name`, `address`, `id_builder`, `stat`) VALUES (rc_name, rc_addr, 1, (SELECT `id_builder` FROM `builders` WHERE `name`=rc_builder));
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

END;

//

DELIMITER ;
