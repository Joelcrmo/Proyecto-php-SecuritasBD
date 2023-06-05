<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Técnico</title>
    <?php include "componentes/head.php"; ?>
</head>
<body>

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Editar Técnico:</h1>
            <br>

            <?php
            require_once "modelo/tecnico.php";
            $tec = new tecnico();
            
            if (isset($_GET['id_tecnico']) && !empty($_GET['id_tecnico'])) {
                $id_tecnico = $_GET['id_tecnico'];
                $tecnico = new tecnico();
                $tecnico->setid_tecnico($_GET['id_tecnico']);
                $tec = $tecnico->obtenerTecnico($id_tecnico);
            }

            if (isset($_POST['id_tecnico'])
            && isset($_POST['nombre_tec']) 
            && isset($_POST['telf_tec']) 
            && isset($_POST['ubicacion_tec'])) {

                $id_tecnico = $_POST['id_tecnico'];
                $nombre_tec = $_POST['nombre_tec'];
                $telf_tec = $_POST['telf_tec'];
                $ubicacion_tec = $_POST['ubicacion_tec'];

                $tec = new tecnico();
                $tec->setid_tecnico($id_tecnico);
                $tec->setnombre_tec($nombre_tec);
                $tec->settelf_tec($telf_tec);
                $tec->setubicacion_tec($ubicacion_tec);

                 if (isset($tec)) { 
                    if ($tec->actualizarTecnico()) {

                    } else {
                        echo "<div class='alert alert-success'>Se actualizó correctamente el Técnico seleccionado.</div>";
                        header("Location: verTecnico.php");
                        exit();
                    }
                } 

            }
            ?>

            <form id="editartecnicoForm" action="editartecnico.php" method="post">
                <div class="form-group">
                    <label>Nombre técnico</label>
                    <input type="text" class="form-control" name="nombre_tec" value="<?php echo ($tec != null) ?  $tec->getnombre_tec(): ' ';?>" required>
                </div>

                <div class="form-group">
                    <label>Teléfono técnico</label>
                    <input type="number" class="form-control" name="telf_tec" value="<?php echo ($tec != null) ? $tec->gettelf_tec(): ' '; ?>" required>
                </div>

                <div class="form-group">
                    <label>Ubicación técnico</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_tec" value="<?php echo ($tec != null) ? $tec->getubicacion_tec(): ' '; ?>" required>
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

                <button type="submit" class="btn btn-primary">Editar técnico</button>
            </form>
            <br>
            <a href="verTecnico.php"><button>Volver al listado</button></a>
        </div>
    </div>
</body>
</html>