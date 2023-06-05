<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Editar Subcontrata</title>
    <?php include "componentes/head.php"; 
    require_once "modelo/subcontrata.php"; ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron">
        <h1>Editar Subcontrata:</h1>
        <br />

        <?php

        if (isset($_GET['ID_subcontrata']) && !empty($_GET['ID_subcontrata'])) {
          $ID_subcontrata = $_GET['ID_subcontrata'];
          $subcontrata = new subcontrata();
          $subcontrata->setID_subcontrata($ID_subcontrata);
          $sub = $subcontrata->obtenerSubcontrata();
        }
        if (
          isset($_POST['ID_subcontrata']) &&
          isset($_POST['nombre_sub']) &&
          isset($_POST['telf_sub']) &&
          isset($_POST['ubicacion_sub']) &&
          isset($_POST['trabajadores_sub']) &&
          isset($_POST['ID_trabajo'])
        ) {
          $ID_subcontrata = $_POST['ID_subcontrata'];
          $nombre_sub = $_POST['nombre_sub'];
          $telf_sub = $_POST['telf_sub'];
          $ubicacion_sub = $_POST['ubicacion_sub'];
          $trabajadores_sub = $_POST['trabajadores_sub'];
          $ID_trabajo = $_POST['ID_trabajo'];

          $sub = new subcontrata();
          $sub->setID_subcontrata($ID_subcontrata);
          $sub->setNombre_sub($nombre_sub);
          $sub->setTelf_sub($telf_sub);
          $sub->setUbicacion_sub($ubicacion_sub);
          $sub->setTrabajadores_sub($trabajadores_sub);
          $sub->setID_trabajo($ID_trabajo);

          if ($sub->actualizarSubcontrata()) {

          } else {
            echo "<div class='alert alert-success'>Se actualizó correctamente los materiales seleccionados.</div>";
            header("Location: verSubcontratas.php");
            exit();
          }
        }

        ?>

        <form id="editarsubcontratasForm" action="editarSubcontratas.php" method="post">
          <div class="form-group">
            <label>ID_subcontrata</label>
            <input
              type="number"
              class="form-control"
              name="ID_subcontrata"
              value="<?php echo ($sub != null) ? $sub->getID_subcontrata() : ''; ?>"
              readonly
            />
          </div>

          <div class="form-group">
            <label>Nombre subcontrata</label>
            <input
              type="text"
              class="form-control"
              name="nombre_sub"
              value="<?php echo ($sub != null) ? $sub->getNombre_sub() : ' '; ?>"
              required
            />
          </div>

          <div class="form-group">
            <label>Teléfono subcontrata</label>
            <input
              type="number"
              class="form-control"
              name="telf_sub"
              value="<?php echo ($sub != null) ? $sub->getTelf_sub() : ' '; ?>"
              required
            />
          </div>

          <div class="form-group">
                    <label>Ubicación subcontrata</label><br>
                    <br><input class="form-control" name="ubicacion_sub" value="<?php echo ($sub != null) ? $sub->getUbicacion_sub() : ' '; ?>" required>
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
            <input
              type="number"
              class="form-control"
              name="trabajadores_sub"
              value="<?php echo ($sub != null) ? $sub->getTrabajadores_sub() : ' '; ?>"
              required
            />
          </div>

          <div class="form-group">
                                <?php 
                                include 'Componentes/listadoTrabajo.php'
                                ?>
                            </div>

          <button type="submit" class="btn btn-primary">Editar Subcontrata</button>
        </form>
        <br />
        <a href="verSubcontratas.php"><label><button>Volver al listado</button></label></a>
      </div>
    </div>
  </body>
</html>