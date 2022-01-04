<?php

require_once './controllers/CategoriaController.php';
require_once './controllers/PedidoController.php';
require_once './controllers/ProductoController.php';
require_once './controllers/UsuarioController.class.php';
require_once './views/layout/header.php';
require_once './views/layout/sidebar.php';


if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
    if (class_exists($nombre_controlador)) {
        $controlador = new $nombre_controlador();
        if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
            
            $action = $_GET['action'];
            $controlador->$action();
        } else {
            echo "La pagina que buscas no existe1";
        }
    } else {
        echo "La pagina que buscas no existe2";
    } 
} else {
    echo "La pagina que buscas no existe3";
}


require_once './views/layout/footer.php';



