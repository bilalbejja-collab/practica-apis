<?php
namespace Incidencias;

 class Incidencia {

    private $id;
    private $latitud;
    private $longitud;
    private $ciudad;
    private $direccion;
    private $etiqueta;
    private $descripcion;
    private $estado;
    private $id_cliente;


    //Constructor
    public function __construct($id=0,$latitud="", $longitud="", $ciudad="", $direccion="", $etiqueta="", $descripcion="", $estado="", $idCliente=0) {
        $this->id = $id;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->etiqueta = $etiqueta;
        $this->descripcion = $descripcion;
        $this->estado = $estado;    
        $this->id_cliente = $idCliente;    
    }
    

     /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    

    /**
     * Get the value of latitud
     */ 
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set the value of latitud
     *
     * @return  self
     */ 
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get the value of longitud
     */ 
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set the value of longitud
     *
     * @return  self
     */ 
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of etiqueta
     */ 
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set the value of etiqueta
     *
     * @return  self
     */ 
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdcliente($idCliente)
    {
        $this->id_cliente = $idCliente;

        return $this;
    }

 }



?>