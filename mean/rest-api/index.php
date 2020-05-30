<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");

class Picture{
    public $name;
    public $url;
    public $date;

    public function __construct($name, $url, $date)
    {
        $this->name = $name;
        $this->url = $url;
        $this->date = $date;
    }
}

date_default_timezone_set('UTC');

$objs = array(
    new Picture("Costa Brava", "1.png", date("Y/M/d")),
    new Picture("In memory of Nelson Mandela", "2.png", date("Y/M/d")),
    new Picture("South of Serbia III", "3.png", date("Y/M/d")),
    new Picture("Mr and Mrs Happy and their son, Smiler", "4.png", date("Y/M/d")),
);

echo json_encode($objs);
?>