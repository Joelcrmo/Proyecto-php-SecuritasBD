CREATE OR REPLACE FUNCTION sp_obtenerListadoMateriales(
	)
    RETURNS SETOF materiales 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM materiales;
    END;
$BODY$;