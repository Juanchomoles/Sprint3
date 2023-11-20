<?php
require __DIR__ . '/src/Core/View.php';
require __DIR__ . '/src/Repository/LoginRepository.php';
require __DIR__ . '/src/Core/Database.php';
require __DIR__ . '/src/Entity/Login.php';
$config = require __DIR__ . '/config/config.php';

try {
    //Crear token?

        echo View::render('create', 'default', );


} catch (Exception $e) {
    throw new Exception("Error de Creacion: " . $e->getMessage());
}

?>
