<?php 
/**
 * It 's designed to ensure only single instance is created and only that one instance is shared accross the system.
 * Establishing connection with database is time consuming and we want only one DB connnection instnace to be shared accross the system
 * Private constructor is used to prevent creation of objects form the class, uses only static method to return one instance 
 */

class DBConnection  {
    private static $instance = null;//hold the class instance
    private $conn;

    private function __construct() {
        $this->conn = ['MySQL Connected!'];
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DBConnection();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

$instance = DBConnection::getInstance();
$conn = $instance->getConnection();
var_dump($conn);

$instance2 = DBConnection::getInstance();
$conn2 = $instance->getConnection();
var_dump($conn2);

$instance = new DBConnection();
var_dump($instance);//will throws error
?>