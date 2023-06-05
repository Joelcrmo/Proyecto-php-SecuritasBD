CREATE OR REPLACE FUNCTION sp_obtenerListadoSubcontrata(
	)
    RETURNS SETOF subcontrata 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM subcontrata;
    END;
$BODY$;