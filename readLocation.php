<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/AppCasillasKotlin/dbConnection.php';

$cve = $_GET["CVE"];

$database = new Database;
$connection = $database->connect();
        
try{
    $sql = 'CALL SP_ReadLocation(?)';

    $statement = $connection->prepare($sql);
    $statement->bindParam(1,$cve);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                
        $lat = $row['LATITUD'];
        $long = $row['LONGITUD'];
        
	    $json = array();
	    $json["lat"] = $lat;
	    $json["long"] = $long;

	    echo json_encode($json);

    }
}
catch(PDOException $e){
    error_log($e->getMessage());
}
finally{
    $statement->closeCursor();
    $connection = null;
}

?>
