<?php
require_once "bd.php";

class notificacionesTec
{
    private $bd;
    private $ID;
    private $ID_tecnico;
    private $mensaje;

    function __construct()
    {
        $bd = new bd();
        $this->bd = $bd->conectarBD();
    }

    function obtenerNorificacionTec()
    {
        try {

            $querySelect = "Call obtener_Notificacion_Tec"; 
            $NotificacionTec = $this->bd->prepare($querySelect);

            $NotificacionTec->execute();
            $result = $NotificacionTec->fetchAll(PDO::FETCH_CLASS, "notificacionesTec");

            return $result;

        } catch (PDOException $ex) {
            throw new Exception("Ocurrió un error al obtener las notificaciones de los tecnicos: " . $ex->getMessage());
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
	public function getID_tecnico() {
		return $this->ID_tecnico;
	}

	/**
	 * @param mixed $ID_tecnico 
	 * @return self
	 */
	public function setID_tecnico($ID_tecnico): self {
		$this->ID_tecnico = $ID_tecnico;
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
}