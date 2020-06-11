<?php
spl_autoload_register(function($ClassName){
    $file = PATH . '/classes/class-' . $ClassName . '.php';
    if(!file_exists($file)){
        echo "Arquivo inexistente";
        return;
    }
    require_once $file;
});