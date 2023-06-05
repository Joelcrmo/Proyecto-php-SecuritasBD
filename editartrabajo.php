<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Trabajo</title>
    <?php include "componentes/head.php"; ?>
</head>
<body>
    
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Editar Trabajo:</h1>
            <br>

            <?php
            require_once "modelo/trabajo.php";

            if (isset($_GET['ID_trabajo']) && !empty($_GET['ID_trabajo'])) {
                $ID_trabajo = $_GET['ID_trabajo'];
                $trabajo = new trabajo();
                $trabajo->setID_trabajo($ID_trabajo);
                $tra = $trabajo->obtenerTrabajo();
            }

            if (isset($_POST['ID_trabajo']) 
            && isset($_POST['tipo_tra']) 
            && isset($_POST['ubicacion_tra']) 
            && isset($_POST['ID_tecnico'])) 
            {
                $ID_trabajo = $_POST['ID_trabajo'];
                $tipo_tra = $_POST['tipo_tra'];
                $ubicacion_tra = $_POST['ubicacion_tra'];
                $ID_tecnico = $_POST['ID_tecnico'];

                $tra = new trabajo();
                $tra->setID_trabajo($ID_trabajo);
                $tra->setTipo_tra($tipo_tra);
                $tra->setUbicacion_tra($ubicacion_tra);
                $tra->setID_tecnico($ID_tecnico);

                if ($tra->actualizarTrabajo()) {

                } else {
                    echo "<div class='alert alert-success'>Se actualizó correctamente el Trabajo seleccionado.</div>";
                    header("Location: verTrabajos.php");
                    exit();
                }
            }
            ?>

            <form id="editartrabajoForm" action="editartrabajo.php" method="post">
                <div class="form-group">
                    <label>ID Trabajo</label>
                    <input type="number" class="form-control" name="ID_trabajo" value="<?php echo ($tra != null) ? $tra->getID_trabajo() : ''; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Tipo trabajo</label>
                    <input type="text" class="form-control" name="tipo_tra" value="<?php echo ($tra != null) ? $tra->getTipo_tra(): ' '; ?>" required>
                </div>

                <div class="form-group">
                    <label>Ubicación trabajo</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_tra" value="<?php echo ($tra != null) ? $tec->getUbicacion_tra(): ' '; ?>" required>
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
                    <label>ID Técnico</label>
                    <input type="number" class="form-control" name="ID_tecnico" value="<?php echo ($tra != null) ? $tra->getID_tecnico(): ' '; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Editar trabajo</button>
            </form>
            <br>
            <a href="verTrabajos.php"><button>Volver al listado</button></a>
        </div>
    </div>
</body>
</html>