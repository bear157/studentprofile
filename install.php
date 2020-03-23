<?php 
include 'classes/Database.php'; 
$host = new Database(true);

try{
    $conn = $host->getConn();
    $conn->beginTransaction(); 
    $sql = file_get_contents('data/init.sql');
    $conn->exec($sql); 
    $conn->commit(); 
    echo "Install success";
}catch(PDOException $e){
    $conn->rollBack(); 
    echo $sql."<br>".$e->getMessage(); 
}

$host->closeConn();
?>