<?php
//http://s735392067.onlinehome.us/
//address no DNS.

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

class ConnectDb {

  private static $instance = null;
  //Defined as static to create connection without
  //instantiation of the class.
  private $conn;

  private $host = "db737006173.db.1and1.com";
  private $user = "dbo737006173";
  private $pass = "9disicom77";
  private $name = "db737006173";


  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }

  //The static function gives a global state of the
  //connection.
  public static function getInstance()
  {
    if(!self::$instance) //If not exists a connection
    {
      self::$instance = new ConnectDb(); //Creates a new one...
    }

    return self::$instance;  //If it exists, return the global connection...
  }

  public function getConnection()
  {
    return $this->conn;  //Return the connection...
  }
}


$movimiento_xml = "<?xml version='1.0' encoding='UTF-8'?>";
$movimiento_xml01=$_GET["movimiento_xml"];
 $observaciones = "";

$movimiento_xml = $movimiento_xml . $movimiento_xml01;

$xml=simplexml_load_string($movimiento_xml) or die("Error: Cannot create object");

foreach($xml->children() as $movimiento) {



       $poll_id = $movimiento->poll_id;
       $poll_id= str_replace("_"," ",$poll_id);
       $fecha_mov = $movimiento->fecha_mov;
       $fecha_mov= str_replace("_"," ",$fecha_mov);
       $name = $movimiento->name;
       $name= str_replace("_"," ",$name);
       $email = $movimiento->email;
       $email= str_replace("_"," ",$email);

       $dateofbirth = $movimiento->dateofbirth;
       $dateofbirth= str_replace("_"," ",$dateofbirth);
       $car = $movimiento->car;
       $car= str_replace("_"," ",$car);
       $model = $movimiento->model;
       $model= str_replace("_"," ",$model);
       $comment = $movimiento->comment;
       $comment= str_replace("_"," ",$comment);
       $uploaded = $movimiento->uploaded;
       $uploaded= str_replace("_"," ",$uploaded);



        $instance = ConnectDb::getInstance(); //Uses the singleton...
        $conn = $instance->getConnection();

    $stmt = $conn->prepare('INSERT INTO pg_poll (poll_id,name,fecha_mov , email,dateofbirth,car,model,comment,uploaded) VALUES (:poll_id,:name,:fecha_mov,:email,:dateofbirth,:car,:model,:comment,:uploaded)');

    $stmt->bindParam(':poll_id', $poll_id);   //Add the parameter to the PDO...
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':fecha_mov', $fecha_mov);   //Add the parameter to the PDO...
    $stmt->bindParam(':email', $email);

    $stmt->bindParam(':dateofbirth', $dateofbirth);
    $stmt->bindParam(':car', $car);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':uploaded', $uploaded);
    $stmt->execute();




$obj = '[{"codigo": "' .$poll_id. '"}]';
echo $obj;


}

?>







