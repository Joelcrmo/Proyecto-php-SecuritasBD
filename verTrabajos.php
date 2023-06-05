<!DOCTYPE html>
<html>
<?php
include "componentes/head.php";
require_once "modelo/trabajo.php";
?>


<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Listado de trabajos: </h1>
            <br>
            <div align="center">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th><a>ID trabajos</a></th>
                            <th><a>Tipo de trabajos</a></th>
                            <th><a>Ubicación del trabajo </a></th>
                            <th><a>ID del técnico </a></th>
                            <th><a>Acciones </a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $trabajo = new Trabajo();
                        $listadotrabajos = $trabajo->obtenerListadoTrabajos();

                        if ($listadotrabajos){
                        foreach ($listadotrabajos as $trabajo) {
                            echo "<tr>
                                <td>" . $trabajo->getid_trabajo() . "</td>
                                <td>" . $trabajo->getTipo_tra() . "</td>
                                <td>" . $trabajo->getUbicacion_tra() . "</td>
                                <td>" . $trabajo->getID_tecnico() . "</td>
                                <td>
                                    <a href='editartrabajo.php?id_trabajo=" . $trabajo->getid_trabajo() . "'><button>Editar trabajo</button></a>
                                    <a href='borrartrabajo.php?id_trabajo=" . $trabajo->getid_trabajo() . "'><button>Borrar trabajo</button></a>
                                </td>
                            </tr>";
                        }
                    }
                    else{
                        echo "<tr><td colspan='4'>No hay trabajos registrados</td></tr>";
                    }
                        ?>
                    </tbody>
                </table>
            </div>

            <br>
            <div align="center">
            <a href="index.php"><button class="btn btn-primary">Inicio</button></a>
                <a href="insertartrabajo.php"><button class="btn btn-primary">Añadir trabajo</button></a>
                <a href="verTecnico.php"><button class="btn btn-primary">Ver Técnicos</button></a>
                <a href="vernotificacionesTrabajo.php"><button class="btn btn-primary">Ver trabajos eliminados</button></a>  
                </div>
            </div>
    </div>
</body>
</html>
