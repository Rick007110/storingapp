<?php

// Initialize the errors array
$errors = [];

// Variables
$attractie = $_POST['attractie'];
if (empty($attractie)) {
    $errors[] = "Vul de attractie-naam in.";
}

$type = $_POST['type'];

$capaciteit = $_POST['capaciteit'];
if (!is_numeric($capaciteit)) {
    $errors[] = "Vul voor capaciteit een geldig getal in.";
}

$melder = $_POST['melder'];
$overig = $_POST['overig'];
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0; // Convert boolean to integer

// Check for errors
if (!empty($errors)) {
    // Display errors or handle them as needed
    var_dump($errors);
    die();
}

echo $attractie . " / " . $type . " / " . $capaciteit . " / " . $prioriteit . " / " . $melder . " / " . $overig;

// Database connection
require_once 'conn.php';

// SQL query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";

// Prepare statement
$statement = $conn->prepare($query);

// Execute query
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit, // Use the integer value
    ":melder" => $melder,
    ":overige_info" => $overig,
]);

header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
// $items = $statement->fetchAll(PDO::FETCH_ASSOC);