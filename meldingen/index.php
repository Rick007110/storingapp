<!doctype html>
<html lang="nl">
<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
</head>
<body>

    <?php require_once '../header.php'; ?>
    
    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>
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

            <table>
                <tr>
                    <th>Titel</th>
                    <th>Inhoud</th>
                </tr>
                <?php foreach($meldingen as $melding): ?>
                    <tr>
                        <td><?php echo $melding['title'];?></td>
                        <td><?php echo $melding['content'];?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

    <pre><?php print_r($meldingen);?></pre>
    </div>  
</body>
</html>
