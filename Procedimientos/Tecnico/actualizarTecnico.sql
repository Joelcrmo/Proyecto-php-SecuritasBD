CREATE OR REPLACE PROCEDURE actualizartecnico(
    _id_tecnico INTEGER,
    _pnombre_tec character varying(50), 
    _ptelf_tec INTEGER, 
    _pubicacion_tec ubicacion
)
LANGUAGE plpgsql
AS $BODY$
BEGIN
    UPDATE tecnico set nombre_tec=_pnombre_tec, telf_tec=_ptelf_tec, ubicacion_tec=_pubicacion_tec
    WHERE id_tecnico=_id_tecnico;
END
$BODY$;