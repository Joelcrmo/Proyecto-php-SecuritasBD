CREATE OR REPLACE PROCEDURE insertarTecnico(
    pnombre_tec CHARACTER VARYING(100),
    ptelf_tec INTEGER,
    pubicacion_tec ubicacion
)
LANGUAGE plpgsql
AS $BODY$
BEGIN 
      INSERT INTO tecnico (nombre_tec, telf_tec, ubicacion_tec)
      VALUES (pnombre_tec, ptelf_tec, pubicacion_tec);
END
$BODY$