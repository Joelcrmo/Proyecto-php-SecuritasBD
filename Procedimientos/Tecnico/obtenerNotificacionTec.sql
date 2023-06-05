DELIMITER //

CREATE PROCEDURE obtener_Notificacion_Tec()
BEGIN
    SELECT * FROM NotificacionesTecnico;
END //

DELIMITER ;