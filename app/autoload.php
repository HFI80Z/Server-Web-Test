<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $classFile = __DIR__ . '/app/' . $classPath . '.php';

    if (file_exists($classFile)) {
        require_once $classFile;
    }
});
