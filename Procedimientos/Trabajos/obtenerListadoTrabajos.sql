CREATE OR REPLACE FUNCTION sp_obtenerListadoTrabajo(
	)
    RETURNS SETOF trabajo 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM trabajo;
    END;
$BODY$;