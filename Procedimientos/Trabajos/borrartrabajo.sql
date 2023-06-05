CREATE OR REPLACE PROCEDURE borrartrabajo(
    _id_trabajo INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN
    UPDATE subcontrata SET id_trabajo = NULL WHERE id_trabajo = _id_trabajo; 
    DELETE FROM trabajo WHERE id_trabajo = _id_trabajo;

    END;
  $BODY$
