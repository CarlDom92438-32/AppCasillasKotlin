<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/com.app.casillas/conexion/dbConnection.php';

$cve = $_GET["CVE"];

$database = new Database;
$connection = $database->connect();
        
try{
    $sql = 'CALL SP_RegisterVote(?)';

    $statement = $connection->prepare($sql);
    $statement->bindParam(1,$cve);
    $statement->execute();

}
catch(PDOException $e){
    error_log($e->getMessage());
}
finally{
    $statement->closeCursor();
    $connection = null;
}

?>