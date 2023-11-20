<?php
require __DIR__ . '/src/Core/View.php';
require __DIR__ . '/src/Repository/LoginRepository.php';
require __DIR__ . '/src/Core/Database.php';
require __DIR__ . '/src/Entity/Login.php';

$config = require __DIR__ . '/config/config.php';
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $database = new Database($config["database"]);
        $logRep = new LoginRepository($database->getConnection(), Login::class);

        $id = $_POST['id'];
        $loginDelete = $logRep->find($id);
        $logRep->delete($loginDelete);

        header("Location: /login_list.php");
    } else {
        throw new Exception("No se recibio la id");
    }
}
catch(Exception $e){
    throw new Exception("Error al borrar los datos: " . $e->getMessage());
}
?>
