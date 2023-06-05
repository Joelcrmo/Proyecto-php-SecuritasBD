CREATE OR REPLACE FUNCTION obtenertrabajo(
    in _id_trabajo INTEGER
	)
    RETURNS SETOF trabajo
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM trabajo where id_trabajo =_id_trabajo;
    END;
$BODY$;