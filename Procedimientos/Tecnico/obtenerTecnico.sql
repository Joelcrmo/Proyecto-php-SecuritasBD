CREATE OR REPLACE FUNCTION obtenertecnico(
    _id_tecnico INTEGER
	)
    RETURNS SETOF tecnico
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM tecnico where id_tecnico =_id_tecnico;
    END;
$BODY$;