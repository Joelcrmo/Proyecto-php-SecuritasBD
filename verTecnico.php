<?php
include "componentes/head.php";
include "modelo/tecnico.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Listado de técnico</title>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Listado de técnicos: </h1>
            <br>
            <div align="center" class="juego">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                        <th><a>id técnico</a></th>
                            <th><a>Nombre técnico</a></th>
                            <th><a>Telefono técnico</a></th>
                            <th><a>Ubicación técnico</a></th>
                            <th><a>Acciones</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tecnico = new tecnico();
                            $listaTecnico = $tecnico->obtenerListadoTecnicos();

                            if ($listaTecnico) {
                                foreach ($listaTecnico as $tecnico) {
                                    echo "<tr>
                                        <td>" . $tecnico->getid_tecnico() . "</td>
                                        <td>" . $tecnico->getnombre_tec() . "</td>
                                        <td>" . $tecnico->gettelf_tec() . "</td>
                                        <td>" . $tecnico->getubicacion_tec() . "</td>
                                        <td>
                                        <a href='editartecnico.php?id_tecnico=" . $tecnico->getid_tecnico() . "'><button>Editar tecnico</button></a>
                                        <a href='borrartecnico.php?id_tecnico=" . $tecnico->getid_tecnico() . "'><button>Borrar tecnico</button></a>
                                        </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay técnicos registrados</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="index.php"><button class="btn btn-primary">Inicio</button></a>
                <a href="insertartecnico.php"><button class="btn btn-primary">Añadir técnico</button></a>
                <a href="verTrabajos.php"><button class="btn btn-primary">Ver trabajos</button></a>
                <a href="vernotificacionesTecnico.php"><button class="btn btn-primary">Ver técnicos eliminados</button></a>            
            </div>
        </div>
    </div>
</body>
</html>
