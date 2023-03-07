<?php

namespace Repository;

use PDO;

class Repository
{

    private $database;

    /**
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getDatabase() : PDO
    {
        return $this->database;
    }

}