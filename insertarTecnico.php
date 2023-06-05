<!DOCTYPE html>
<html>
<?php
include "componentes/head.php";
require "modelo/tecnico.php";
require "modelo/trabajo.php";
?>


<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Crear nuevo Técnico: </h1>
            <br>

            <?php

            if (
                isset($_POST['nombre_tec'])
                && isset($_POST['telf_tec'])
                && isset($_POST['ubicacion_tec'])
            ) {

                $nombre_tec = $_POST['nombre_tec'];
                $telf_tec = $_POST['telf_tec'];
                $ubicacion_tec = $_POST['ubicacion_tec'];

                $tecnico = new tecnico();
                
                $tecnico->setnombre_tec($nombre_tec);
                $tecnico->settelf_tec($telf_tec);
                $tecnico->setubicacion_tec($ubicacion_tec);

                echo $tecnico->insertarTecnico();
            }

            ?>
            <form id="insertartecnicoForm" action="insertarTecnico.php" method="post">

                <div class="form-group">
                    <label>Nombre técnico</label>
                    <input type="text" class="form-control" name="nombre_tec" required>
                </div>

                <div class="form-group">
                    <label>Teléfono técnico</label>
                    <input type="number" class="form-control" name="telf_tec" required>
                </div>

                <div class="form-group">
                    <label>Ubicación técnico</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_tec" required>
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

                <div align="center">
                <a><button type="submit" class="btn btn-primary">Crear técnico</button></a>
                </div>
            </form>
            <br>
            <a href="verTecnico.php"><button class="btn btn-primary">Volver a la tabla técnicos</button></a>
        </div>
    </div>
</body>

</html>
