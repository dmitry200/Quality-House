

select *
FROM `rcs` r
	INNER JOIN `rc_home` rc ON r.id_rc=rc.id_rc
	INNER JOIN `homes` h ON rc.id_home=h.id_home
	INNER JOIN `home_flat` hf ON h.id_home=hf.id_home
	INNER JOIN `flats` f ON hf.id_flat=f.id_flat
WHERE f.count_rooms <= 2 AND f.balcony=0 AND f.square<=10 AND f.stat=1