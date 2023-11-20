<?php
require __DIR__ . '/src/Core/View.php';
require __DIR__ . '/src/Repository/LoginRepository.php';
require __DIR__ . '/src/Core/Database.php';
require __DIR__ . '/src/Entity/Login.php';
$config = require __DIR__ . '/config/config.php';

try {
    if (isset($_GET['id'])) {
        $database = new Database($config["database"]);
        $loginRepository = new LoginRepository($database->getConnection(), Login::class);
        $login = $loginRepository->find($_GET['id']);

        echo View::render('delete', 'default',  ["login" => [$login]]);

    } else {
        throw new Exception("No se ha proporcionado la id");
    }
} catch (Exception $e) {
    throw new Exception("Error de delete: " . $e->getMessage());
}

?>
