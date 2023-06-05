CREATE OR REPLACE PROCEDURE insertarmateriales(
    ptipo_mat CHARACTER VARYING,
    pubicacion_mat ubicacion,
    pid_tecnico INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO materiales (tipo_mat, ubicacion_mat, id_tecnico)
    VALUES (ptipo_mat, pubicacion_mat, pid_tecnico);
END
$BODY$;