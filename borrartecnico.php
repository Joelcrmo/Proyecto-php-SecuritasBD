<!DOCTYPE html>
<html>
    <?php
        include "componentes/head.php";
        require "modelo/tecnico.php";
    ?>

    <body>
        <h1>Borrar Técnico:</h1>

        <?php
            if (isset($_GET['id_tecnico']) && !empty($_GET['id_tecnico'])) {
                $id_tecnico = $_GET['id_tecnico'];
                $tecnico = new tecnico();
                $tecnico->setid_tecnico($id_tecnico);
                echo $tecnico->borrartecnico($id_tecnico);
            }
        ?>

        <br>
        <a href="VerTecnico.php">
            <button class="btn btn-primary">Volver al Listado</button>
        </a>
    </body>
</html>
