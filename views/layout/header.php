<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
    <div id="container">


        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="/assets/img/camiseta.png" alt="Camiseta">
                <a href="<?=base_url?>">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias()?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>">
                        Inicio
                    </a>
                </li>
                <?php while($cat = $categorias->fetch_object()):?>
                 <li>
                     <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>">
                        <?=$cat->nombre?>
                    </a>
                </li>
                <?php endwhile;?>
               
                
            </ul>
        </nav>
        <div id="content">