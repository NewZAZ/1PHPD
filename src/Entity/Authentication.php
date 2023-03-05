<?php

class Authentication {

    private $id;

    var $login;

    var $password;

    var $customer_id;

    /**
     * @param $id
     * @param $login
     * @param $password
     * @param $customer_id
     */
    public function __construct($id, $login, $password, $customer_id)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function id($id) : Authentication
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */

    public function login($login) : Authentication
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function password($password) : Authentication
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function customerID($customer_id) : Authentication
    {
        $this->customer_id = $customer_id;
        return $this;
    }

}