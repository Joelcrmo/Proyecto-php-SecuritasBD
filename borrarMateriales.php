<!DOCTYPE html>
<html>
    <?php
        include "componentes/head.php";
        require "modelo/materiales.php";
    ?>

    <body>
        <h1>Borrar Materiales:</h1>

        <?php
            if (isset($_GET['id_material']) && !empty($_GET['id_material'])) {
                $id_material = $_GET['id_material'];
                $materiales = new materiales();
                $materiales->setid_material($id_material);
                echo $materiales->borrarMateriales($id_material);
            }
        ?>

        <br>
        <a href="VerMateriales.php">
            <button class="btn btn-primary">Volver al Listado</button>
        </a>
    </body>
</html>