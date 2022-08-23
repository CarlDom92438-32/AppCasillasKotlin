<?php

class Database
{
    private $host = "162.241.62.141";
    private $dbName = "disenow5_db_Casillas";
    private $username = "disenow5_casilla";
    private $password = "cocodrilo1";

    private $con;

    public function connect()
    {
        $this->con = null;
        
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        
        try {
            $this->con = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $pe) {
            die("Could not connect to the database $this->dbname :" . $pe->getMessage());
        }
        
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->con;
    }
}

?>