<?php


class pedido {
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsuario_id($usuario_id): void {
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $this->db->escape_string($provincia);
    }

    public function setLocalidad($localidad): void {
        $this->localidad =  $this->db->escape_string($localidad);
    }

    public function setDireccion($direccion): void {
        $this->direccion =  $this->db->escape_string($direccion);
    }

    public function setCoste($coste): void {
        $this->coste = $coste;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setHora($hora): void {
        $this->hora = $hora;
    }

    
    public function getAll() {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOne() {
        $productos = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }


    public function save() {
        $sql = "INSERT INTO pedidos VALUES(NULL, '{$this->getUsuario_id()}','{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()},'confirmed', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);
        
        if($save) {
            return true;
        }
        
        return false;
    }
    
    
}