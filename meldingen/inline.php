<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>De Krant</title>
</head>
<body>
    <?php
    $title = "Brandweer redt kat uit boom";
    $date = "1 feb 2021";
    $contents = "lorem ipsum";
    ?> 

    <h1><?php echo $title; ?></h1>
    <p><em>Datum: <?php echo $date; ?></em></p>

    <?php if(isset($_GET['msg']))
    {
        echo "<div class='msg'>" . $_GET['msg'] . "</div>";
    }
    ?>

    <?php 
        require_once '../backend/conn.php';
        $query = "SELECT * FROM meldingen";
        $statement = $conn->prepare($query);
        $statement->execute();
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <pre><?php print_r($meldingen);?></pre>
</body>
</html>