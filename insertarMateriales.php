<!DOCTYPE html>
<html>

<?php
include "componentes/head.php";
require "modelo/tecnico.php";
require "modelo/materiales.php";
?>

<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Crear nuevos materiales: </h1>
            <br>

            <?php
if (
                
    isset($_POST['tipo_mat']) 
    && isset($_POST['ubicacion_mat']) 
    && isset($_POST['id_tecnico'])
    
){
    $tipo_mat = $_POST['tipo_mat'];
    $ubicacion_mat = $_POST['ubicacion_mat'];
    $id_tecnico = $_POST['id_tecnico'];

    $Materiales = new Materiales();

    $Materiales->settipo_mat($tipo_mat);
    $Materiales->setubicacion_mat($ubicacion_mat);
    $Materiales->setid_tecnico($id_tecnico);

    if ($Materiales->insertarMateriales()) {
        echo "Los Materiales ha sido creado con éxito.";
    } else {
        echo "Ocurrió un error inesperado al crear los Materiales.";
    }
}

?>
<form id="insertarmaterialesForm" action="insertarMateriales.php" method="post">

            <div class="form-group">
                <label>Tipo Material</label>
                <input type="text" class="form-control" name="tipo_mat" required>
            </div>

            <div class="form-group">
                    <label>Ubicación materiales</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_mat" required>
                        <option value="Gran Canaria">Gran Canaria</option>
                        <option value="Tenerife">Tenerife</option>
                        <option value="La Gomera">La Gomera</option>
                        <option value="La Palma">La Palma</option>
                        <option value="Lanzarote">Lanzarote</option>
                        <option value="Fuerteventura">Fuerteventura</option>
                        <option value="El Hierro">El Hierro</option>
                        <option value="La Graciosa">La Graciosa</option>
                    </select>
                </div>

                <div class="form-group">
                <?php 
                include 'Componentes/listadoTecnico.php'
                ?>
                </div>


                <div align="center">
                <a><button type="submit" class="btn btn-primary">Crear Materiales</button></a>
            </div>
            </form>
        <br>
    <a href="verMateriales.php"><button class="btn btn-primary">Volver al listado</button></a>
    </div>
    </div>
</body>

</html>
