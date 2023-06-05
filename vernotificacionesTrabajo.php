<?php
include "Componentes/head.php";
include "Modelo/notificacionesTrabajo.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trabajos eliminaods</title>
</head>
<body>
<div class="container-fluid">
        <div class="jumbotron">
    <h1>Notificaciones de Trabajos</h1>
    <br>
            <div align="center" class="juego">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th><a>ID de notifcación </a></th>
                            <th><a>ID del trabajo </a></th>
                            <th><a>Mensaje</a></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $notificacionesTra = new notificacionesTra();
                            $NotificacionTra = $notificacionesTra->obtenerNorificacionTra();

                            if ($NotificacionTra) {
                                foreach ($NotificacionTra as $notificacionesTra) {
                                    echo "<tr>
                                        <td>" . $notificacionesTra->getID() . "</td>
                                        <td>" . $notificacionesTra->getID_trabajo() . "</td>
                                        <td>" . $notificacionesTra->getMensaje() . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay trabajos eliminados</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="index.php"><button class="btn btn-primary">Inicio</button></a>
                <a href="verTrabajos.php"><button class="btn btn-primary">Ver trabajos</button></a>
            </div>
        </div>
    </div>
</body>
</html>