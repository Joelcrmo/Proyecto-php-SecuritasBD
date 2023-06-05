CREATE OR REPLACE PROCEDURE insertarSubcontrata(
    pnombre_sub CHARACTER VARYING,
    ptelf_sub INTEGER,
    pubicacion_sub ubicacion,
    ptrabajadores_sub CHARACTER VARYING,
    pid_trabajo INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO subcontrata (nombe_sub, telf_sub, ubicacion_sub, trabajadores_sub, id_trabajo)
    VALUES (pnombre_sub, ptelf_sub, pubicacion_sub, ptrabajadores_sub, pid_trabajo);
END
$BODY$;