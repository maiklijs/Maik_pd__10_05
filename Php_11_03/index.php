<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursu pieteikumu kalkulators</title>
</head>
<body>
    <?php require_once __DIR__ . '/data.php';?>
    <?php require_once __DIR__ . '/functions.php';?>

<form action="">
    <label for=""></label>
</form>

<label>Kursu skaits: <?php echo count($kursi) ?></label>

<table border="solid black 1px">
    <tr>
        <th>Kurss</th>
        <th>Cena vienam dalībniekam</th>
    </tr>

    <?php foreach ($kursi as $kurs) { ?>
        <tr>
            <td><?php echo $kurs["nosaukums"]; ?></td>
            <td><?php echo number_format($kurs["cena"], 2, ",", " "); ?> €</td>
        </tr>
<?php
     } 
?>
</table>
    
</body>
</html>