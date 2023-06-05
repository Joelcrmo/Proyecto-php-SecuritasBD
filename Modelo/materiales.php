<?php

require_once "bd.php";

class materiales {
    private $bd;
    private $id_material;
    private $tipo_mat;
    private $ubicacion_mat;
    private $id_tecnico;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }


    function obtenerListadomateriales()
    {
        try {
            $querySelect = "SELECT * FROM public.sp_obtenerListadomateriales()"; 
            $listamateriales = $this->bd->prepare($querySelect);

            $listamateriales->execute();
            return $listamateriales->fetchAll(PDO::FETCH_CLASS, "materiales");
        } catch (PDOException $ex) {
            throw new Exception("Ocurrió un error al obtener el Listado de materiales: " . $ex->getMessage());
        } finally {
            $listamateriales = null;
            $this->bd = null;
        }
    }

    function insertarmateriales()
    {
        try {
            $queryInsertar = $this->bd->prepare("CALL insertarmateriales( ?, ? , ?)");
            $queryInsertar->bindParam( 1, $this->tipo_mat);
            $queryInsertar->bindParam( 2, $this->ubicacion_mat);
            $queryInsertar->bindParam( 3, $this->id_tecnico);

            $queryInsertar->execute();

            if ($queryInsertar) {
                header("Location:vermateriales.php");
                exit();
            } else {
                throw new Exception("Ocurrió un error inesperado al crear los materiales");
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al insertar los materiales: " . $ex->getMessage());
        } finally {
            $queryInsertar = null;
            $this->bd = null;
        }
    }

    function borrarmateriales($id_material)
    {
        try {
            $queryBorrar = "CALL borrarmateriales(:id_material)";
            $instanciaDB = $this->bd->prepare($queryBorrar);
            $instanciaDB->bindParam(":id_material", $this->id_material);
            $instanciaDB->execute();

            $num_filas_afectadas = $instanciaDB->rowCount();

            if ($num_filas_afectadas == 1) {
                return "No eliminó correctamente el material con ID " . $id_material;
            } else {
                return "Se pudo eliminar el material con ID " . $id_material;
            }
        } catch (PDOException $e) {
            throw new Exception("Ocurrió un error al borrar material: " . $e->getMessage());
        }
    }

    function obtenermateriales($id_material)
    {
        try {
            $querySelect = "SELECT * FROM public.obtenermateriales(:id_material)";
            $instanciaDB = $this->bd->prepare($querySelect);
    
            $instanciaDB->bindParam(":id_material",$this->id_material);
    
            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "materiales");
    
            if (count($resultado) > 0) {
                return $resultado[0];
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al obtener el Material: " . $ex->getMessage());
        }
    }

    function actualizarmateriales($id_material, $tipo_mat, $ubicacion_mat, $id_tecnico)
    {
        try {
            $queryUpdate = "CALL actualizar_materiales(:id_material, :tipo_mat, :ubicacion_mat, :id_tecnico)";

            $instanciaDB = $this->bd->prepare($queryUpdate);

            $instanciaDB->bindParam(":id_material", $id_material);
            $instanciaDB->bindParam(":tipo_mat", $tipo_mat);
            $instanciaDB->bindParam(":ubicacion_mat", $ubicacion_mat);
            $instanciaDB->bindParam(":id_tecnico", $id_tecnico);

            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "materiales");
    
            if ($resultado == 1) {
                return true;
            } else {
                return false;
            }
		} catch (PDOException $ex) {
			throw new Exception("Ocurrió un error al actualizar los materiales: " . $ex->getMessage());
		}
		finally {
			$instanciaDB = null;
            $this->bd = null;
		}
    }

    /**
     * @return mixed
     */
    public function getBd() {
        return $this->bd;
    }

    /**
     * @param mixed $bd 
     * @return self
     */
    public function setBd($bd): self {
        $this->bd = $bd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getid_material() {
        return $this->id_material;
    }

    /**
     * @param mixed $id_material 
     * @return self
     */
    public function setid_material($id_material): self {
        $this->id_material = $id_material;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo_mat() {
        return $this->tipo_mat;
    }

    /**
     * @param mixed $tipo_mat 
     * @return self
     */
    public function setTipo_mat($tipo_mat): self {
        $this->tipo_mat = $tipo_mat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUbicacion_mat() {
        return $this->ubicacion_mat;
    }

    /**
     * @param mixed $ubicacion_mat 
     * @return self
     */
    public function setUbicacion_mat($ubicacion_mat): self {
        $this->ubicacion_mat = $ubicacion_mat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getid_tecnico() {
        return $this->id_tecnico;
    }

    /**
     * @param mixed $id_tecnico 
     * @return self
     */
    public function setid_tecnico($id_tecnico): self {
        $this->id_tecnico = $id_tecnico;
        return $this;
    }
}