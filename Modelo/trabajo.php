<?php
 require_once "bd.php";

 class trabajo{
    private $bd;
    private $id_trabajo;
    private $tipo_tra;
    private $ubicacion_tra;
    private $id_tecnico;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }

	function obtenerListadoTrabajos()
	{
		try {
			$querySelect = "SELECT * FROM public.sp_obtenerListadoTrabajo()"; 
			$listaTrabajo = $this->bd->prepare($querySelect);
			
			$listaTrabajo->execute();
			return $listaTrabajo->fetchAll(PDO::FETCH_CLASS, "trabajo");
		} catch (PDOException $ex) {
			throw new Exception("Ocurrió un error al obtener el Listado de Trabajos: " . $ex->getMessage());
		} finally {
			$listaTrabajo = null;
			$this->bd = null;
		}
	}
	

	function insertarTrabajo()
    {
        try {
            $queryInsertar = $this->bd->prepare("Call insertarTrabajo( ?, ?, ?)");
            $queryInsertar->bindParam( 1 , $this->tipo_tra);
            $queryInsertar->bindParam( 2 , $this->ubicacion_tra);
            $queryInsertar->bindParam( 3 , $this->id_tecnico);

            $queryInsertar->execute();

            if ($queryInsertar) {
                header("Location:verTrabajos.php");
                exit();
            } else {
                throw new Exception("Ocurrió un error inesperado al crear el Trabajo");
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al insertar el Trabajo: " . $ex->getMessage());
        } finally {
            $queryInsertar = null;
            $this->bd = null;
        }
    }

	    function borrartrabajo($id_trabajo)
    {
        try {
            $queryBorrar = "CALL borrartrabajo(:id_trabajo)";
            $instanciaDB = $this->bd->prepare($queryBorrar);
            $instanciaDB->bindParam(":id_trabajo", $this->id_trabajo);
            $instanciaDB->execute();
    
            $num_filas_afectadas = $instanciaDB->rowCount();
    
            if ($num_filas_afectadas == 1) {
                return "No eliminó correctamente el trabajo con ID " . $id_trabajo;
            } else {
                return "Se pudo eliminar el trabajo con ID " . $id_trabajo;
            }
        } catch (PDOException $e) {
            throw new Exception("Ocurrió un error al borrar el trabajo: " . $e->getMessage());
        }
    }

 function obtenerTrabajo($id_trabajo)
    {
        try {
            $querySelect = "SELECT * FFROM public.obtenertrabajo(:id_trabajo)";
            $instanciaDB = $this->bd->prepare($querySelect);
    
            $instanciaDB->bindParam(":id_trabajo", $this->id_trabajo);
    
            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "trabajo");

            if (count($resultado) > 0) {
                return $resultado[0];
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al obtener el Técnico: " . $ex->getMessage());
        }
    }
    function actualizarTrabajo($id_trabajo, $tipo_tra, $ubicacion_tra, $id_tecnico)
    {
        try {
            $queryUpdate = "CALL public.actualizar_Trabajo(:id_trabajo, :tipo_tra, :ubicacion_tra, :id_tecnico)";
    
            $instanciaDB = $this->bd->prepare($queryUpdate);
    
            $instanciaDB->bindParam(":id_trabajo", $id_trabajo);
            $instanciaDB->bindParam(":tipo_tra", $tipo_tra);
            $instanciaDB->bindParam(":ubicacion_tra", $ubicacion_tra);
            $instanciaDB->bindParam(":id_tecnico", $id_tecnico);
    
            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "trabajo");
    
            if ($resultado == 1) {
                return true;
            } else {
                return false;
            }
    
        } catch (PDOException $ex) {
        } finally {
            $instanciaDB = null;
            $this->bd = null;
        }
    }
    


	/**
	 * @return mixed
	 */
	public function getUbicacion_tra() {
		return $this->ubicacion_tra;
	}
	
	/**
	 * @param mixed $ubicacion_tra 
	 * @return self
	 */
	public function setUbicacion_tra($ubicacion_tra): self {
		$this->ubicacion_tra = $ubicacion_tra;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getID_trabajo() {
		return $this->id_trabajo;
	}
	
	/**
	 * @param mixed $id_trabajo 
	 * @return self
	 */
	public function setID_trabajo($id_trabajo): self {
		$this->id_trabajo = $id_trabajo;
		return $this;
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
	public function getTipo_tra() {
		return $this->tipo_tra;
	}

	/**
	 * @param mixed $tipo_tra 
	 * @return self
	 */
	public function setTipo_tra($tipo_tra): self {
		$this->tipo_tra = $tipo_tra;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getID_tecnico() {
		return $this->id_tecnico;
	}

	/**
	 * @param mixed $id_tecnico 
	 * @return self
	 */
	public function setID_tecnico($id_tecnico): self {
		$this->id_tecnico = $id_tecnico;
		return $this;
	}
}