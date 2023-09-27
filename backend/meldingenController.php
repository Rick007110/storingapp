<?php

$errors = [];

//Variabelen vullen
$attractie = $_POST['attractie'];
if (empty($attractie)) {
    $errors[] = "Vul de attractie-naam in.";
}

$type = $_POST['type'];

$capaciteit = $_POST['capaciteit'];
if (!is_numeric($capaciteit)) {
    $errors[] = "Vul voor capaciteit een geldig getal in.";
}

$prioriteit = isset($_POST['prioriteit']); // Use the posted value directly
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

if(isset($errors)) { var_dump($errors); die(); }

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