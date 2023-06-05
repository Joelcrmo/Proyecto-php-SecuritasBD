<!DOCTYPE html>
<html>
    <?php
        include "componentes/head.php";
        require "modelo/subcontrata.php";
    ?>

    <body>
        <h1>Borrar Subcontrata:</h1>

        <?php
            if (isset($_GET['id_subcontrata']) && !empty($_GET['id_subcontrata'])) {
                $id_subcontrata = $_GET['id_subcontrata'];
                $subcontrata = new subcontrata();
                $subcontrata->setid_subcontrata($id_subcontrata);
                echo $subcontrata->borrarSubcontrata($id_subcontrata);
            }
        ?>

        <br>
        <a href="VerSubcontratas.php">
            <button class="btn btn-primary">Volver al Listado</button>
        </a>
    </body>
</html>