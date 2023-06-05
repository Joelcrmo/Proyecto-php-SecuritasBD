CREATE OR REPLACE PROCEDURE borrarmateriales(
    _id_material INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN

    DELETE FROM materiales WHERE id_material = _id_material;

    END;
  $BODY$