<?php

//$simpleAutoload = function(string $name)
//{
//    if( file_exists( "vendor/Character.php" ))
//    {
//    require_once "vendor/Character.php";
//    }
//};

spl_autoload_register();

spl_autoload_register(function ($className) {
    $parts = explode('//', $className);
    $className = end($parts);

    require_once $className. '.php';

});

