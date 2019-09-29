<?php
class Database {

    private $db_name = "my_application";
    private $host = "localhost";
    private $username = "root";
    private $password = "nor0136655";
    public $conn;
    public function create_connection(){
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);

             //echo "Connected successfully";
        }
        catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this -> conn;
    }
}


?>