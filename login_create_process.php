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

        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = new Login();
        $login->setUsername($username);
        $login->setPassword($password);
        $login->setRole("admin");


        $logRep->create($login);

        header("Location: /login_list.php");
    } else {
        throw new Exception("No se recibieron los datos");
    }
}
catch(Exception $e){
    throw new Exception("Error al crear usuario: " . $e->getMessage());
}
?>