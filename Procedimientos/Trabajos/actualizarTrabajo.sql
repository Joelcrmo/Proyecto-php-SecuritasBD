DELIMITER //

CREATE PROCEDURE actualizar_Trabajo(
    IN pID_trabajo INT, 
    IN ptipo_tra VARCHAR(100),
    IN pubicacion_tra VARCHAR(100),
    IN pID_tecnico INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar el trabajo.';
    END;

    START TRANSACTION;

    UPDATE Trabajo SET 
        tipo_tra = ptipo_tra, 
        ubicacion_tra = pubicacion_tra, 
        ID_tecnico = pID_tecnico
    WHERE ID_trabajo = pID_trabajo;

    COMMIT;
END //

DELIMITER ;