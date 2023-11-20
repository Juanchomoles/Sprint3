<?php

require __DIR__ . '/../Core/Repository.php';


class LoginRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function find(int $id): EntityInterface
    {
        // TODO: Implement find() method.
        try {

            //Se realiza la consulta
            $pdoStatement = $this->pdo->prepare("SELECT * FROM login WHERE id = :id");
            $pdoStatement->execute([':id' => $id]);
            $loginRecord = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            //Captura la excepcion
            if (!$loginRecord) {
                throw new Exception("No se ha encontrado ningun registro con la id $id");
            }

            //Trasformar el Array devuelto en un Entidad

            return Login::fromArray($loginRecord);

        } catch (Exception $e) {
            throw new Exception("Problemas en mostrar los datos: " . $e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
        $pdoStatement = $this->pdo->prepare("SELECT * FROM login");
        $pdoStatement->execute();
        // TODO: Implement FetchMode in PDO object
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);

        // get all records from database
        $loginRecords = $pdoStatement->fetchAll();

        $logins = [];
        // transform records into objects
        foreach ($loginRecords as $loginRecord) {
            $logins[] = call_user_func_array([$this->entityClassName, "fromArray"], [$loginRecord]);
        }

        return $logins;
    }

    /**
     * @inheritDoc
     */
    public function create(EntityInterface $entity): void
    {
        // TODO: Implement create() method.
        try {
            if ($entity == null) {
                throw new Exception("No existe la entidad");
            }
            $statementCreate = "INSERT INTO login(username, password, role) VALUES (:username, :password, :role)";
            $pdoCreate = $this->pdo->prepare($statementCreate);

            $pdoCreate->bindValue(':username', $entity->getusername());
            $pdoCreate->bindValue(':password', $entity->getPassword());
            $pdoCreate->bindValue(':role', $entity->getRole());
            $pdoCreate->execute();
        } catch (PDOException $e) {
            throw  new Exception("Error al crear la base de datos: " . $e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(EntityInterface $entity): void
    {
        // TODO: Implement delete() method.
        try {
            $pdoDelete = $this->pdo->prepare("DELETE FROM login WHERE id = :id");
            $id = $entity->getId();
            if ($id === null) {
                throw new Exception("La id no es valida");
            }
            $pdoDelete->execute([':id' => $id]);
        } catch (PDOException $e) {
            throw new Exception( "Problemas borrando los datos: " . $e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
        try {

            $pdoUpdate = $this->pdo->prepare("UPDATE login SET username = :username, password = :password, role = :role WHERE id = :id");
            $id = $entity->getId();

            $pdoUpdate->bindValue(':id', $id);
            $pdoUpdate->bindValue(':username', $entity->getUsername());
            $pdoUpdate->bindValue(':password', $entity->getPassword());
            $pdoUpdate->bindValue(':role', $entity->getRole());

            $pdoUpdate->execute();

            if ($id === null) {
                throw new Exception("No existe la id Proporcionada para actualizar la tabla");
            }
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar los datos: " . $e->getMessage());
        }
    }
}