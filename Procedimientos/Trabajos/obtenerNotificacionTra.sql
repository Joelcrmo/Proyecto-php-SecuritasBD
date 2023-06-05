DELIMITER //

CREATE PROCEDURE obtener_Notificacion_Tra()
BEGIN
    SELECT * FROM NotificacionesTrabajo;
END //

DELIMITER ;