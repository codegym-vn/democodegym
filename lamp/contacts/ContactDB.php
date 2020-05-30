<?php

include_once 'Contact.php';

/**
 * Created by PhpStorm.
 * User: nhatnk
 * Date: 7/8/17
 * Time: 2:11 PM
 */
class ContactDB
{
    public function connect(){
        try{
            return new PDO('mysql:host=127.0.0.1;dbname=demo_contacts', "demo", "codegym@demo123456");
        }catch (PDOException $e) {
            echo $e;
        }
    }

    public function getAll(){
        $query = "SELECT * FROM contacts";
        $db = $this->connect();
        $result = $db->query($query);
        $contacts = [];
        foreach ($result as $row) {
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];

            $contact = new Contact($id, $first_name, $last_name, $phone, $email, $address);
            $contacts[] = $contact;
        }
        return $contacts;
    }

    public function create($contact){
        $db = $this->connect();
        $result = $db->exec("INSERT INTO contacts values (0, '$contact->first_name','$contact->last_name', '$contact->phone', '$contact->email', '$contact->address')");
        return $result > 0;

    }

    public function search($term) {
        $db = $this->connect();

        $result = $db->query("select * from contacts where first_name LIKE '%$term%' or last_name LIKE '%$term%'");
        $contacts = [];
        foreach ($result as $row) {
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];

            $contact = new Contact($id, $first_name, $last_name, $phone, $email, $address);
            $contacts[] = $contact;
        }
        return $contacts;
    }

    public function get($id){
        $db = $this->connect();
        $statement = $db->query("select * from contacts where id=$id");
        $result = $statement->fetch();
        if(isset($result)){
            $id = $result['id'];
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $phone = $result['phone'];
            $email = $result['email'];
            $address = $result['address'];

            $contact = new Contact($id, $first_name, $last_name, $phone, $email, $address);
            return $contact;
        }
        return null;

    }

    public function remove($id){
        $db = $this->connect();
        $result = $db->exec("DELETE FROM contacts WHERE id=$id");
        return $result > 0;

    }
}

