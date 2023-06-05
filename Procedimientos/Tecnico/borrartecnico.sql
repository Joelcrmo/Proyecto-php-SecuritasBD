CREATE OR REPLACE PROCEDURE borrartecnico(
    _id_tecnico INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN
    UPDATE Trabajo SET id_tecnico = NULL WHERE id_tecnico = _id_tecnico;
    UPDATE Materiales SET id_tecnico = NULL WHERE id_tecnico = _id_tecnico;
    DELETE FROM tecnico WHERE id_tecnico = _id_tecnico;

    END;
  $BODY$
