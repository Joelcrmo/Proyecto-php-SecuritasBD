<?php
include "Componentes/head.php";
include "Modelo/notificacionesTecnico.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notificaciones de Técnicos</title>
</head>
<body>
<div class="container-fluid">
        <div class="jumbotron">
    <h1>Notificaciones de Técnicos</h1>
    <br>
            <div align="center" class="juego">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th><a>ID de notifcación </a></th>
                            <th><a>ID del tecnico </a></th>
                            <th><a>Mensaje</a></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $notificacionesTec = new notificacionesTec();
                            $NotificacionTec = $notificacionesTec->obtenerNorificacionTec();

                            if ($NotificacionTec) {
                                foreach ($NotificacionTec as $notificacionesTec) {
                                    echo "<tr>
                                        <td>" . $notificacionesTec->getID() . "</td>
                                        <td>" . $notificacionesTec->getID_tecnico() . "</td>
                                        <td>" . $notificacionesTec->getMensaje() . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay tecnicos eliminados</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="index.php"><button class="btn btn-primary">Inicio</button></a>
                <a href="verTecnico.php"><button class="btn btn-primary">Ver Tecnicos</button></a>
            </div>
        </div>
    </div>
</body>
</html>