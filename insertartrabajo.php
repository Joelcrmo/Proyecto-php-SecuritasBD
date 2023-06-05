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
            <h1>Crear nuevo Trabajo: </h1>
            <br>

            <?php

            if (
                isset($_POST['tipo_tra']) 
                && isset($_POST['ubicacion_tra']) 
                && isset($_POST['id_tecnico'])
                
            ){

                $tipo_tra = $_POST['tipo_tra'];
                $ubicacion_tra = $_POST['ubicacion_tra'];
                $id_tecnico = $_POST['id_tecnico'];

                $trabajo = new trabajo();

                $trabajo->settipo_tra($tipo_tra);
                $trabajo->setubicacion_tra($ubicacion_tra);
                $trabajo->setid_tecnico($id_tecnico);
                
                echo $trabajo->insertartrabajo();
                var_dump;
            }

            ?>
            <form id="insertartrabajoForm" action="insertartrabajo.php" method="post">


                <div class="form-group">
                    <label>Tipo Trabajo</label>
                    <input type="text" class="form-control" name="tipo_tra" required>
                </div>

                <div class="form-group">
                    <label>Ubicación trabajos</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_tra" required>
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
                <a><button type="submit" class="btn btn-primary">Crear trabajo</button></a>
                </div>
            </form>
            <br>
            <a href="verTrabajos.php"><button class="btn btn-primary">Volver al listado</button></a>
        </div>
    </div>
   
</body>

</html>
