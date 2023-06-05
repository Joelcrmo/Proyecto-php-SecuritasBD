CREATE OR REPLACE FUNCTION sp_obtenerListadoTecnicos(
	)
    RETURNS SETOF tecnico 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM tecnico;
    END;
$BODY$;