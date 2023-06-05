CREATE OR REPLACE FUNCTION obtenerSubcontrata(
    in _id_subcontrata INTEGER
	)
    RETURNS SETOF subcontrata
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM subcontrata where id_subcontrata =_id_subcontrata;
    END;
$BODY$;