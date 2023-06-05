CREATE OR REPLACE PROCEDURE insertarTrabajo(
    ptipo_tra CHARACTER VARYING,
    pubicacion_tra ubicacion,
    pid_tecnico INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO Trabajo (tipo_tra, ubicacion_tra, id_tecnico)
    VALUES (ptipo_tra, pubicacion_tra, pid_tecnico);
END
$BODY$;

