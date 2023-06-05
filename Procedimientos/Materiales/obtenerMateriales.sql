CREATE OR REPLACE FUNCTION obtenermateriales(
    in _id_material INTEGER
	)
    RETURNS SETOF materiales
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM materiales where id_material =_id_material;
    END;
$BODY$;