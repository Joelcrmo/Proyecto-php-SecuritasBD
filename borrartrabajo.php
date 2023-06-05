<!DOCTYPE html>
<html>
    <?php
        include "componentes/head.php";
        require "modelo/trabajo.php";
    ?>

    <body>
        <h1>Borrar Trabajo:</h1>

        <?php
            if (isset($_GET['id_trabajo']) && !empty($_GET['id_trabajo'])) {
                $id_trabajo = $_GET['id_trabajo'];
                $trabajo = new trabajo();
                $trabajo->setid_trabajo($id_trabajo);
                echo $trabajo->borrartrabajo($id_trabajo);
            }
        ?>

        <br>
        <a href="VerTrabajos.php">
            <button class="btn btn-primary">Volver al Listado</button>
        </a>
    </body>
</html>
