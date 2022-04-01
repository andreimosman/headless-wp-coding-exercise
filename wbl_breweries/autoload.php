<?php

spl_autoload_register(function($className) {

    $filename = str_replace('\\', '/', $className);

    $paths = ['src', 'lib'];

    foreach($paths as $path) {
        $file = __DIR__ . "/$path/$filename.php";
        if(file_exists($file)) {
            require_once($file);
            return;
        }
    }

});