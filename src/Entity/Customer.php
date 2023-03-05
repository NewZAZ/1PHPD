<?php

class Customer{

    var $id;

    var $cart_id;

    public function __construct($id, $cart_id)
    {
        $this->id = $id;
        $this->cart_id = $cart_id;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCartId() : int
    {
        return $this->cart_id;
    }
}