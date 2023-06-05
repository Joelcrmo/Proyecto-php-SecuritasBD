<div class="form-group">
    <label>Registrado por ID tecnico </label>
    <br>
    <select class="form-select" name="id_tecnico" aria-label="" required>
        <?php
        include_once "modelo/tecnico.php";
            $tec = new tecnico();
            $listatecnico = $tec->obtenerListadoTecnicos();
            echo "<option value='' selected disabled>Selecciona a un tecnico</option>";
            foreach ($listatecnico as $tec) {
                echo "<option value=" . $tec->getid_tecnico();
                if (isset($id_tecnico)) {
                    if ($tec->getid_tecnico() == $id_tecnico) {
                        echo " selected='selected' ";
                    }
                }
                echo ">" . $tec->getNombre_tec() ."</option>";
            }
        ?>
    </select>
</div>