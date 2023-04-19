<?php 
namespace App\Database\Config;



class Connection {
    private $hostName = "localhost";
    private $databaseUserName = "root";
    private $databasePassword = "";
    private $databaseName = "scandiweb";
    private $port = 3306;

    protected \mysqli $conn;

    public function __construct()
    {
        $this->conn = new \mysqli($this->hostName , $this->databaseUserName , $this->databasePassword , $this->databaseName , $this->port);

        // if($this->conn->connect_error){
        //     die("connection failed" . $this->conn->connect_error);
        // }
        // echo "connected successfully";
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}

?>