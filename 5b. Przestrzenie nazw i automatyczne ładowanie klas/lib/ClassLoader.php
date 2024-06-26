<?php

namespace lib;

class ClassLoader {
    public static function autoload($class) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file = __DIR__ . '/../' . $path . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register('lib\\ClassLoader::autoload');
?>
