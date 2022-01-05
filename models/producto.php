<?php


class producto {
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCategoria_id() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCategoria_id($categoria_id): void {
        $this->categoria_id = $this->db->escape_string($categoria_id);
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->db->escape_string($nombre);
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $this->db->escape_string($descripcion);
    }

    public function setPrecio($precio): void {
        $this->precio = $this->db->escape_string($precio);
    }

    public function setStock($stock): void {
        $this->stock = $this->db->escape_string($stock);
    }

    public function setOferta($oferta): void {
        $this->oferta = $this->db->escape_string($oferta);
    }

    public function setImagen($imagen): void {
        $this->imagen = $this->db->escape_string($imagen);
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    
    public function getOne() {
        $productos = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }


    public function save() {
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getCategoria_id()}','{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()},null, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);
        
        if($save) {
            return true;
        }
        
        return false;
    }
    
    public function delete() {
        $sql = "DELETE FROM productos WHERE id ={$this->id}";
        $delete = $this->db->query($sql);
        if($delete) {
            return true;
        }
        
        return false;
    }
}