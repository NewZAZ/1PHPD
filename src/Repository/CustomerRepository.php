<?php

namespace Repository;

use Customer;

class CustomerRepository extends Repository
{

    public function findUserByUserNameAndPassword(string $userName, string $password) : ?Customer{

        $PDOStatement = $this->getDatabase()->query("SELECT * FROM CUSTOMERS WHERE username='$userName' AND password='$password'");

        foreach ($PDOStatement as $row){
            return new \Customer($row['id'], $row['cart_id'], $row['login'], $row['email'], $row['password']);
        }
        return null;
    }
}