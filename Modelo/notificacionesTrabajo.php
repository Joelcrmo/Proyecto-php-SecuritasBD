<?php
require_once "bd.php";

class notificacionesTra
{
    private $bd;
    private $ID;
    private $ID_trabajo;    
    private $mensaje;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }

    function obtenerNorificacionTra()
    {
        try {

            $querySelect = "Call obtener_Notificacion_Tra"; 
            $NotificacionTec = $this->bd->prepare($querySelect);

            $NotificacionTec->execute();
            $result = $NotificacionTec->fetchAll(PDO::FETCH_CLASS, "notificacionesTra");

            return $result;

        } catch (PDOException $ex) {
            throw new Exception("Ocurrió un error al obtener las notificaciones de los trabajos: " . $ex->getMessage());
        } finally {
            $NotificacionTec = null;
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
	public function getID() {
		return $this->ID;
	}

	/**
	 * @param mixed $ID 
	 * @return self
	 */
	public function setID($ID): self {
		$this->ID = $ID;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMensaje() {
		return $this->mensaje;
	}

	/**
	 * @param mixed $mensaje 
	 * @return self
	 */
	public function setMensaje($mensaje): self {
		$this->mensaje = $mensaje;
		return $this;
	}

	/**
	 * @param mixed $ID_trabajo 
	 * @return self
	 */
	public function setID_trabajo($ID_trabajo): self {
		$this->ID_trabajo = $ID_trabajo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getID_trabajo() {
		return $this->ID_trabajo;
	}
}