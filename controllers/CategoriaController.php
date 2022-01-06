<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController {
    public function index() {
        Utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }
    
    public function ver() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $categoria = new categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            
            $producto = new producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
            
        }
        require_once 'views/categoria/ver.php';
    }
    
    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save() {
        Utils::isAdmin();
        
        if(isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:".base_url."categoria/index");
    }
} 

