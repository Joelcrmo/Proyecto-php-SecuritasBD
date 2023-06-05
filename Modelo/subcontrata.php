<?php
 require_once "bd.php";
 
 class subcontrata{
    private $bd;
    private $id_subcontrata;
    private $nombre_sub;
    private $telf_sub;
    private $ubicacion_sub;
    private $trabajadores_sub;
    private $id_trabajo;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }


	function obtenerListadoSubcontrata()
	{
		try {
			$querySelect = "SELECT * FROM public.sp_obtenerListadoSubcontrata()"; 
			$listaSubcontrata = $this->bd->prepare($querySelect);
			
			$listaSubcontrata->execute();
			return $listaSubcontrata->fetchAll(PDO::FETCH_CLASS, "subcontrata");
		} catch (PDOException $ex) {
			throw new Exception("Ocurrió un error al obtener el Listado de Subcontratas: " . $ex->getMessage());
		} finally {
			$listaSubcontrata = null;
			$this->bd = null;
		}
	}

    function insertarSubcontrata()
    {
        try {
            $queryInsertar = $this->bd->prepare("CALL insertarSubcontrata(? ,? ,? ,? ,?)");
            $queryInsertar->bindParam( 1, $this->nombre_sub);
            $queryInsertar->bindParam( 2, $this->telf_sub);
            $queryInsertar->bindParam( 3, $this->ubicacion_sub);
            $queryInsertar->bindParam( 4, $this->trabajadores_sub);
            $queryInsertar->bindParam( 5, $this->id_trabajo);

            $queryInsertar->execute();

            if ($queryInsertar) {
                header("Location:verSubcontratas.php");
                exit();
            } else {
                throw new Exception("Ocurrió un error inesperado al crear la Subcontrata");
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al insertar la Subcontrata: " . $ex->getMessage());
        } finally {
            $queryInsertar = null;
            $this->bd = null;
        }
    }

    function borrarSubcontrata($id_subcontrata)
    {
        try {
			$queryBorrar = "CALL borrarSubcontrata(:id_subcontrata)";
            $instanciaDB = $this->bd->prepare($queryBorrar);
            $instanciaDB->bindParam(":id_subcontrata", $this->id_subcontrata);
            $instanciaDB->execute();
    
            $num_filas_afectadas = $instanciaDB->rowCount();

            if ($num_filas_afectadas == 1) {
                return "no eliminó correctamente la Subcontrata con ID " . $id_subcontrata;
            } else {
                return "Se pudo eliminar la Subcontrata con ID " . $id_subcontrata;
            }
        } catch (PDOException $e) {
            $conexion = null;
            throw new Exception("Ocurrió un error al borrar la subcontrata: " . $e->getMessage());
        }
    }

    function obtenerSubcontrata($id_subcontrata)
    {
        try {
            $querySelect = "SELECT * FROM public.obtenerSubcontrata(:id_subcontrata)";
            $instanciaDB = $this->bd->prepare($querySelect);
    
            $instanciaDB->bindParam(":id_subcontrata", $this->id_subcontrata);
    
            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "subcontrata");

            if (count($resultado) > 0) {
                return $resultado[0];
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al obtener la subcontrata : " . $ex->getMessage());
        }
    }

	function actualizarSubcontrata()
	{
		try {
			$queryUpdate = "CALL actualizar_Subcontrata(:id_subcontrata,:nombre_sub, :telf_sub, :ubicacion_sub, :trabajadores_sub, :id_trabajo)";
	
			$instanciaDB = $this->bd->prepare($queryUpdate);

			$instanciaDB->bindParam(":id_subcontrata", $this->id_subcontrata);
			$instanciaDB->bindParam(":nombre_sub", $this->nombre_sub);
			$instanciaDB->bindParam(":telf_sub", $this->telf_sub);
			$instanciaDB->bindParam(":ubicacion_sub", $this->ubicacion_sub);
			$instanciaDB->bindParam(":trabajadores_sub", $this->trabajadores_sub);
			$instanciaDB->bindParam(":id_trabajo", $this->id_trabajo);

            $instanciaDB->execute();
    
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "subcontrata");
    
            if ($resultado == 1) {
                return true;
            } else {
                return false;
            }
    
        } catch (Exception $ex) {
        } finally {
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
	public function getid_subcontrata() {
		return $this->id_subcontrata;
	}

	/**
	 * @param mixed $id_subcontrata 
	 * @return self
	 */
	public function setid_subcontrata($id_subcontrata): self {
		$this->id_subcontrata = $id_subcontrata;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getnombre_sub() {
		return $this->nombre_sub;
	}

	/**
	 * @param mixed $nombre_sub 
	 * @return self
	 */
	public function setnombre_sub($nombre_sub): self {
		$this->nombre_sub = $nombre_sub;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function gettelf_sub() {
		return $this->telf_sub;
	}

	/**
	 * @param mixed $telf_sub 
	 * @return self
	 */
	public function settelf_sub($telf_sub): self {
		$this->telf_sub = $telf_sub;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getubicacion_sub() {
		return $this->ubicacion_sub;
	}

	/**
	 * @param mixed $ubicacion_sub 
	 * @return self
	 */
	public function setubicacion_sub($ubicacion_sub): self {
		$this->ubicacion_sub = $ubicacion_sub;
		return $this;
	}

	/**
	 * @param mixed $trabajadores_sub 
	 * @return self
	 */
	public function settrabajadores_sub($trabajadores_sub): self {
		$this->trabajadores_sub = $trabajadores_sub;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function gettrabajadores_sub() {
		return $this->trabajadores_sub;
	}

	/**
	 * @return mixed
	 */
	public function getid_trabajo() {
		return $this->id_trabajo;
	}

	/**
	 * @param mixed $id_trabajo 
	 * @return self
	 */
	public function setid_trabajo($id_trabajo): self {
		$this->id_trabajo = $id_trabajo;
		return $this;
	}
}