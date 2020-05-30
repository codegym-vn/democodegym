<?php
/**
 * Created by PhpStorm.
 * User: nhat
 * Date: 10/27/17
 * Time: 10:24 AM
 */

class Database
{
    private $url = 'mysql:host=127.0.0.1;dbname=demo_classicmodels';
    private $user = 'demo';
    private $password = 'codegym@demo123456';

    public function connect(){
        return new PDO($this->url, $this->user, $this->password);
    }
}