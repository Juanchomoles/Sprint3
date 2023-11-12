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
    }

    /**
     * @inheritDoc
     */
    public function delete(EntityInterface $entity): void
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function update(EntityInterface $entity): void
    {
        // TODO: Implement update() method.
    }
}