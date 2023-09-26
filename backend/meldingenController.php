<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, melder) VALUES(:attractie, :type, :melder)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([ ":attractie" => $attractie, ":type" => $type, ":melder" => $melder,]);

// $items = $statement->fetchAll(PDO::FETCH_ASSOC);