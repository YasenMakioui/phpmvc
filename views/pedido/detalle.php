<h1>Detalles del pedido</h1>

<?php if (isset($pedido)) : ?>
    <h3>Dirección de envio</h3>
    provincia: <?=$pedido->provincia?> <br>
    ciudad: <?=$pedido->localidad?> <br>
    Direccion:<?=$pedido->direccion?><br><br>
    <h3>Datos del pedido:</h3>

    Numero de pedido: <?= $pedido->id ?><br>
    Total a pagar: <?= $pedido->coste ?><br>
    Productos: <br>
    <?php while ($producto = $productos->fetch_object()) : ?>
        <ul>
            <li><?= $producto->nombre ?> - <?= $producto->precio ?> - x<?= $producto->unidades ?></li>
        </ul>
    <?php endwhile; ?>

<?php endif; ?>