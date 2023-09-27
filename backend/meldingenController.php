<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$prioriteit = $_POST['prioriteit'];
$melder = $_POST['melder'];
$overig = $_POST['overig'];

if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}

echo $attractie . " / " . $type . " / " . $capaciteit . " / " . $prioriteit . " / " . $melder . " / " . $overig;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([ 
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overig,
]);

header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
// $items = $statement->fetchAll(PDO::FETCH_ASSOC);