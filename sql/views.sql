
DROP VIEW IF EXISTS all_rcs;

CREATE VIEW all_rcs(rc_name, rc_address, rc_builder, rc_status, rc_text_status, rc_area_name)
as SELECT rcs.name, rcs.address, builders.name, rc_status.id_status, rc_status.description, areas.name FROM `rcs` 
	INNER JOIN `builders` ON rcs.id_builder=builders.id_builder
	INNER JOIN `rc_status` ON rcs.stat=rc_status.id_status
	INNER JOIN `area_rc` ON rcs.id_rc=area_rc.id_rc
	INNER JOIN `areas` ON area_rc.id_area=areas.id_area
	ORDER BY rcs.name;

