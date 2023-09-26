<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type) VALUES(:attractie, :type)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([ ":attractie" => $attractie, ":type" => $type, ]);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);