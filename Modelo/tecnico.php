<?php
require_once "bd.php";

class tecnico
{
    private $bd;
    private $id_tecnico;
    private $nombre_tec;
    private $telf_tec;
    private $ubicacion_tec;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }



    function obtenerListadoTecnicos()
    {
        try {

            $querySelect = "SELECT * FROM public.sp_obtenerListadotecnicos()"; 
            $listaTecnico = $this->bd->prepare($querySelect);

            $listaTecnico->execute();
            $result = $listaTecnico->fetchAll(PDO::FETCH_CLASS, "tecnico");

            return $result;

        } catch (PDOException $ex) {
            throw new Exception("Ocurrió un error al obtener el Listado de Tecnicos: " . $ex->getMessage());
        } finally {
            $listaTecnico = null;
            $this->bd = null;
        }
    }


    function insertarTecnico()
    {
        try {

            $queryInsertar= $this->bd->prepare("CALL insertartecnico(?, ?, ?)");
            $queryInsertar->bindParam( 1 , $this->nombre_tec);
            $queryInsertar->bindParam( 2 , $this->telf_tec);
            $queryInsertar->bindParam( 3 , $this->ubicacion_tec);

            $queryInsertar->execute();

            if ($queryInsertar) {
                header("Location:verTecnico.php");
                exit();
            } else {
                throw new Exception("Ocurrió un error inesperado al crear el Técnico");
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al insertar el Técnico: " . $ex->getMessage());
        } finally {
            $queryInsertar = null;
            $this->bd = null;
        }
    }


    function borrartecnico($id_tecnico)
    {
        try {
            $queryBorrar = "CALL borrartecnico(:id_tecnico)";
            $instanciaDB = $this->bd->prepare($queryBorrar);
            $instanciaDB->bindParam(":id_tecnico", $this->id_tecnico);
            $instanciaDB->execute();
    
            $num_filas_afectadas = $instanciaDB->rowCount();
    
            if ($num_filas_afectadas == 1) {
                return "No eliminó correctamente el técnico con id " . $id_tecnico;
            } else {
                return "Se eliminó correctamente el técnico con id  " . $id_tecnico;
            }
        } catch (PDOException $e) {
            throw new Exception("Ocurrió un error al borrar el técnico: " . $e->getMessage());
        }
    }


    function obtenerTecnico($id_tecnico)
    {
        try {
            $querySelect = "SELECT * from public.obtenertecnico(:id_tecnico)";
            $instanciaDB = $this->bd->prepare($querySelect);

            $instanciaDB->bindParam(":id_tecnico", $this->id_tecnico);

            $instanciaDB->execute();

            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "tecnico");

            if (count($resultado) > 0) {
                return $resultado[0];
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrió un error al obtener el Técnico: " . $ex->getMessage());
        }
    }


    function actualizarTecnico()
    {
        try {
            $queryUpdate = "CALL public.actualizartecnico(:id_tecnico, :nombre_tec, :telf_tec, :ubicacion_tec)";
            $instanciaDB = $this->bd->prepare($queryUpdate);
    
            $instanciaDB->bindParam(":id_tecnico", $id_tecnico);
            $instanciaDB->bindParam(":nombre_tec", $nombre_tec);
            $instanciaDB->bindParam(":telf_tec", $telf_tec);
            $instanciaDB->bindParam(":ubicacion_tec", $ubicacion_tec);
    
            $instanciaDB->execute();
            $resultado = $instanciaDB->fetchAll(PDO::FETCH_CLASS, "tecnico");
    
            if ($resultado === false) {
                $errorInfo = $instanciaDB->errorInfo();
                throw new Exception("Error al actualizar técnico: " . $errorInfo[2]);
            }
    
            if (count($resultado) === 1) {
                return true;
            }
    
            return false;
    
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
    
        } finally {
            $instanciaDB = null;
            $this->bd = null;
        }
    }



//Gets

    /**
     * @return mixed
     */
    public function getid_tecnico()
    {
        return $this->id_tecnico;
    }

    /**
     * @return mixed
     */
    public function getnombre_tec()
    {
        return $this->nombre_tec;
    }

    /**
     * @return mixed
     */
    public function gettelf_tec()
    {
        return $this->telf_tec;
    }

    /**
     * @return mixed
     */
    public function getubicacion_tec()
    {
        return $this->ubicacion_tec;
    }

//sets

    /**
     * @param mixed  
     * @return self
     */
    public function setid_tecnico($id_tecnico): self
    {
        $this->id_tecnico = $id_tecnico;
        return $this;
    }

    /**
     * @param mixed 
     * @return self
     */
    public function setnombre_tec($nombre_tec): self
    {
        $this->nombre_tec = $nombre_tec;
        return $this;
    }

    /**
     * @param mixed 
     * @return self
     */
    public function settelf_tec($telf_tec): self
    {
        $this->telf_tec = $telf_tec;
        return $this;
    }

    /**
     * @param mixed 
     * @return self
     */
    public function setubicacion_tec($ubicacion_tec): self
    {
        $this->ubicacion_tec = $ubicacion_tec;
        return $this;
    }
}