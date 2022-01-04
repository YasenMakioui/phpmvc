<?php


spl_autoload_register( function($name) {
    if (is_file('/controllers/'.$name.'.class.php')) {
        require_once('/controllers/'.$name.'.class.php');
    } else {
        echo "no existe";
    }
});
