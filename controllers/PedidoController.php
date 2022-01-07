<?php

require_once 'models/pedido.php';

class pedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            //Guardar en bd
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($provincia && $localidad && $direccion) {
                $pedido = new pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);


                $save = $pedido->save();


                $pedido_linea = $pedido->save_linea();


                if ($save && $pedido_linea) {

                    $_SESSION['pedido'] = "completed";
                    echo "completed";
                } else {
                    $_SESSION['pedido'] = "failed";
                    echo "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }
            header("Location: " . base_url . 'pedido/confirmado');
        } else {
            //Redirigir al index
            header("Location: " . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new pedido();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos() {
        require_once 'views/pedido/mis_pedidos.php';
    }
}
