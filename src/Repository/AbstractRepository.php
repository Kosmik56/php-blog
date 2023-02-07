<?php

namespace App\Repository;

use App\Service\DatabaseConnection;

abstract class AbstractRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection;
    }
}