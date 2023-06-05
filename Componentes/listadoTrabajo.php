<div class="form-group">
    <label>Registrado por ID trabajo </label>
    <br>
    <select class="form-select" name="id_trabajo" aria-label="" required>
        <?php
        include_once "modelo/trabajo.php";
            $tra = new trabajo();
            $listatrabajo = $tra->obtenerListadoTrabajos();
            echo "<option value='' selected disabled>Selecciona a un trabajo</option>";
            foreach ($listatrabajo as $tra) {
                echo "<option value=" . $tra->getid_trabajo();
                if (isset($id_trabajo)) {
                    if ($tra->getid_trabajo() == $id_trabajo) {
                        echo " selected='selected' ";
                    }
                }
                echo ">" . $tra->getTipo_tra() ."</option>";
            }
        ?>
    </select>
</div>