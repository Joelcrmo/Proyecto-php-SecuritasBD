<?php
include "componentes/head.php";
include "modelo/subcontrata.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Listado de Subcontrata</title>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Listado de Subcontratas: </h1>
            <br>
            <div align="center" class="juego">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th><a>ID subcontrata</a></th>
                            <th><a>Nombre subcontrata</a></th>
                            <th><a>Telefono subcontrata</a></th>
                            <th><a>Ubicación subcontrata</a></th>
                            <th><a>Trabajadores subcontrata</a></th>
                            <th><a>ID del Trabajo</a></th>
                            <th><a>Acciones</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Subcontrata = new Subcontrata();
                            $listaSubcontrata = $Subcontrata->obtenerListadoSubcontrata();

                            if ($listaSubcontrata) {
                                foreach ($listaSubcontrata as $Subcontrata) {
                                    echo "<tr>
                                        <td>" . $Subcontrata->getid_subcontrata() . "</td>
                                        <td>" . $Subcontrata->getnombre_sub() . "</td>
                                        <td>" . $Subcontrata->gettelf_sub() . "</td>
                                        <td>" . $Subcontrata->getubicacion_sub() . "</td>
                                        <td>" . $Subcontrata->gettrabajadores_sub() . "</td>
                                        <td>" . $Subcontrata->getid_trabajo() . "</td>
                                        <td>
                                        <a href='editarSubcontratas.php?id_subcontrata=" . $Subcontrata->getid_subcontrata() . "'><button>Editar Subcontrata</button></a>
                                        <a href='borrarSubcontrata.php?id_subcontrata=" . $Subcontrata->getid_subcontrata() . "'><button>Borrar Subcontrata</button></a>
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
                <a href="insertarSubcontrata.php"><button class="btn btn-primary">Añadir subcontrata</button></a>
                <a href="verMateriales.php"><button class="btn btn-primary">Ver Materiales</button></a>
            </div>
        </div>
    </div>
</body>
</html>