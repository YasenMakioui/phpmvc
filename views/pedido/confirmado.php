<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta 1231412312314234HS con el coste del pedido, será procesado y enviado.
    </p>
    <br>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido:</h3>

        Numero de pedido: <?= $pedido->id ?><br>
        Total a pagar: <?= $pedido->coste ?><br>
        Productos: <br>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <ul>
                <li><?=$producto->nombre?> - <?=$producto->precio?> - x<?=$producto->unidades?></li>
            </ul>
        <?php endwhile; ?>

    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'completed') : ?>
    <h1>Tu pedido no ha podido ser procesado</h1>
<?php endif; ?>