<?php

/**
 * Created by PhpStorm.
 * User: nhatnk
 * Date: 7/8/17
 * Time: 2:08 PM
 */
class Contact
{
    public $id;
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $address;

    public function __construct($id = 0, $first_name = NULL, $last_name = NULL, $phone = NULL, $email = NULL, $address = NULL)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }
}