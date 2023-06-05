CREATE OR REPLACE PROCEDURE borrarSubcontrata(
    _id_subcontrata INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN

    DELETE FROM subcontrata WHERE id_subcontrata = _id_subcontrata;

    END;
  $BODY$