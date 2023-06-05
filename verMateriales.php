<?php
include "componentes/head.php";
include "modelo/materiales.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Listado de materiales</title>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Listado de materiales: </h1>
            <br>
            <div align="center" class="juego">
                <table align="center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th><a>ID material </a></th>
                            <th><a>Tipo material</a></th>
                            <th><a>Ubicacio material</a></th>
                            <th><a>ID del técnico</a></th>
                            <th><a>Acciones</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            $Materiales = new Materiales();
                            $listaMateriales = $Materiales->obtenerListadoMateriales();

                            if ($listaMateriales) {
                                foreach ($listaMateriales as $Materiales) {
                                    echo "<tr>
                                        <td>" . $Materiales->getid_material() . "</td>
                                        <td>" . $Materiales->getTipo_mat() . "</td>
                                        <td>" . $Materiales->getUbicacion_mat() . "</td>
                                        <td>" . $Materiales->getid_tecnico() . "</td>
                                        <td>
                                        <a href='editarMateriales.php?id_material=" . $Materiales->getid_material() . "'><button>Editar Materiales</button></a>
                                        <a href='borrarMateriales.php?id_material=" . $Materiales->getid_material() . "'><button>Borrar Materiales</button></a>
                                        </td>
                                        
                                        </tr>";
                                }
                            
                            } else { 
                                echo "<tr><td colspan='4'>No hay materiales registrados</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href="index.php"><button class="btn btn-primary">Inicio</button></a>
                <a href="insertarMateriales.php"><button class="btn btn-primary">Añadir Materiales</button></a>
                <a href="verSubcontratas.php"><button class="btn btn-primary">Ver Subcontrata</button></a>
            </div>
        </div>
    </div>
</body>
</html>