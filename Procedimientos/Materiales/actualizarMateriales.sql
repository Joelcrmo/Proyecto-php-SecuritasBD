DELIMITER //

CREATE PROCEDURE actualizar_Materiales(
    IN pID_materiales INT,
    IN ptipo_mat VARCHAR(100),
    IN pubicacion_mat VARCHAR(100),
    IN pID_tecnico INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar los materiales.';
    END;

    START TRANSACTION;

    UPDATE Materiales SET 
        tipo_mat = ptipo_mat, 
        ubicacion_mat = pubicacion_mat, 
        ID_tecnico = pID_tecnico
    WHERE ID_materiales = pID_materiales;

    COMMIT;
END //

DELIMITER ;