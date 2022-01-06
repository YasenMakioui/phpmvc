<?php
require_once 'config/db.php';

class categoria {

    private $id;
    private $nombre;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->db->escape_string($nombre);
    }
    
    public function getAll() {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
    }
    
    public function getOne() {
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $categoria->fetch_object();
    }
    
    public function save() {
       $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        
        if($save) {
            return true;
        }
        
        return false;
    }
}    