<!DOCTYPE html>
<html>

<?php
include "componentes/head.php";
require "modelo/trabajo.php";
require "modelo/subcontrata.php";
?>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Crear nueva Subcontrata: </h1>
            <br>

            <?php
            if (
                
                isset($_POST['nombre_sub']) 
                && isset($_POST['telf_sub']) 
                && isset($_POST['ubicacion_sub'])
                && isset($_POST['trabajadores_sub'])
                && isset($_POST['id_trabajo'])
            ){
                $nombre_sub = $_POST['nombre_sub'];
                $telf_sub = $_POST['telf_sub'];
                $ubicacion_sub = $_POST['ubicacion_sub'];
                $trabajadores_sub = $_POST['trabajadores_sub'];
                $id_trabajo = $_POST['id_trabajo'];
            
                $Subcontrata = new Subcontrata();
            
                $Subcontrata->setnombre_sub($nombre_sub);
                $Subcontrata->settelf_sub($telf_sub);
                $Subcontrata->setubicacion_sub($ubicacion_sub);
                $Subcontrata->settrabajadores_sub($trabajadores_sub);
                $Subcontrata->setid_trabajo($id_trabajo);
            
                if ($Subcontrata->insertarSubcontrata()) {
                    echo "Los Subcontrata ha sido creado con éxito.";
                } else {
                    echo "Ocurrió un error inesperado al crear la subcontrata.";
                }
            }
            ?>
            <form id="insertarSubcontrataForm" action="insertarSubcontrata.php" method="post">
            
                        <div class="form-group">
                            <label>Nombre subcontrata</label>
                            <input type="text" class="form-control" name="nombre_sub" required>
                        </div>
            
                        <div class="form-group">
                            <label>Telefono subcontrata</label>
                            <input type="number" class="form-control" name="telf_sub" required>
                            </div>
            
                <div class="form-group">
                    <label>Ubicación subcontrata</label><br>
                    <br>
                    <select class="form-control" name="ubicacion_sub" required>
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
                                <label>Trabajadores subcontrata</label>
                                <input type="number" class="form-control" name="trabajadores_sub" required>
                            </div>

                            <div class="form-group">
                                <?php 
                                include 'Componentes/listadoTrabajo.php'
                                ?>
                            </div>

                            <div align="center">
                            <a><button type="submit" class="btn btn-primary">Crear Subcontrata</button></a>
                        </div>
                        </form>
                    <br>
               <a href="verSubcontratas.php"><button class="btn btn-primary">Volver al listado</button></a>
                </div>
                </div>
            </body>
            
            </html>           