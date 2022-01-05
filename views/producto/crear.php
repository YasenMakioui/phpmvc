<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url."producto/edit&id="; ?>
<?php else: ?>
    <h1>Crear Nuevo Producto</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>
<div class="form_container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=$pro->nombre?>">

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" ><?=$pro->descripcion?></textarea>


        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?=$pro->precio?>">

        <label for="stock">Nombre</label>
        <input type="number" name="stock" value="<?=$pro->stock?>">

        <label for="categoria">Nombre</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()): ?>
            <option value="<?= $cat->id ?>" <?= $cat->id == $pro->categoria_id ? 'selected' : ''?>> 

                    <?= $cat->nombre ?>

                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">
        
        <input type="submit" value="Guardar">
    </form>
</div>

