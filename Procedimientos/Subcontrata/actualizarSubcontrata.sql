DELIMITER //

CREATE PROCEDURE actualizar_Subcontrata(IN pID_subcontrata INT, IN pnombre_sub VARCHAR(100), IN ptelf_sub INT(9), IN pubicacion_sub VARCHAR(100), IN ptrabajadores_sub INT, IN pID_trabajo INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar la subcontrata.';
    END;

    START TRANSACTION;

    UPDATE Subcontrata 
    SET nombre_sub = pnombre_sub, 
        telf_sub = ptelf_sub, 
        ubicacion_sub = pubicacion_sub, 
        trabajadores_sub = ptrabajadores_sub, 
        ID_trabajo = pID_trabajo 
    WHERE ID_subcontrata = pID_subcontrata;

    COMMIT;
END //

DELIMITER ;