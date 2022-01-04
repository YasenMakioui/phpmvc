<?php

require_once './controllers/CategoriaController.php';
require_once './controllers/PedidoController.php';
require_once './controllers/ProductoController.php';
require_once './controllers/UsuarioController.php';
require_once './controllers/ErrorController.php';
require_once './views/layout/header.php';
require_once './views/layout/sidebar.php';
require_once './config/parameters.php';


function show_error()
{
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif(!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
}else {
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif(!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->index();     
    }else {
        show_error();
    }
} else {
    show_error();
}


require_once './views/layout/footer.php';
