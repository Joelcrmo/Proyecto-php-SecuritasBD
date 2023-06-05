<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Materiales</title>
    <?php include "componentes/head.php"; ?>
</head>
<body>

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Editar Materiales:</h1>
            <br>

            <?php
            require_once "modelo/materiales.php";

            if (isset($_GET['id_material']) && !empty($_GET['id_material'])) {
                $id_material = $_GET['id_material'];
                $materiales = new Materiales();
                $materiales->setid_material($id_material);
                $mat = $materiales->obtenerMateriales();
            }

            if (isset($_POST['id_material'])
            && isset($_POST['tipo_mat']) 
            && isset($_POST['ubicacion_mat']) 
            && isset($_POST['ID_tecnico'])) 
            {
                $id_material = $_POST['id_material'];
                $tipo_mat = $_POST['tipo_mat'];
                $ubicacion_mat = $_POST['ubicacion_mat'];
                $ID_tecnico = $_POST['ID_tecnico'];

                $mat = new Materiales();
                $mat->setid_material($id_material);
                $mat->setTipo_mat($tipo_mat);
                $mat->setUbicacion_mat($ubicacion_mat);
                $mat->setID_tecnico($ID_tecnico);

                if ($mat->actualizarMateriales()) {

                } else {
                     echo "<div class='alert alert-success'>Se actualizó correctamente los materiales seleccionados.</div>";
                     header("Location: verMateriales.php");
                     exit();
                    }

            }

                ?>
                <form id="editarmaterialesForm" action="editarMateriales.php" method="post">
                    <div class="form-group">
                        <label>ID materiales</label>
                        <input type="number" class="form-control" name="id_material" value="<?php echo ($mat != null) ? $mat->getid_material() : ''; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tipo materiales</label>
                        <input type="text" class="form-control" name="tipo_mat" value="<?php echo ($mat != null) ? $mat->getTipo_mat() : ''; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>Ubicación materiales</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_mat" value="<?php echo ($mat != null) ? $mat->getUbicacion_mat() : ''; ?>" required>
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

                    <button type="submit" class="btn btn-primary">Editar Materiales</button>
                </form>
                <br>
            <a href="verMateriales.php"><button>Volver al listado</button></a>
        </div>
    </div>
</body>
</html>