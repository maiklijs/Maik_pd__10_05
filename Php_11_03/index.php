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
            <td><?php echo number_format($kurs["cena"], 2, ".", ' '); ?> EUR</td>
        </tr>
<?php
     } 
?>
</table>

<form method="POST" action="">
    <label for="vards">Vārds:</label><br>
<input type="text" name="vards" id="vards" placeholder="Vārds" required><br><br>

<label for="epasts">E-pasts:</label><br>
<input type="email" name="epasts" id="epasts" placeholder="E-pasts" required><br><br>

<label for="kurss">Kurss:</label><br>
<select name="kurss" id="kursuIzvele" required>
    <option value="" disabled selected>Izvēlies kursu</option>
    <?php foreach($kursi as $k) { ?>
    <option value="<?php echo $k["kurss"] ?>"><?php echo $k["nosaukums"]?></option>

<?php    } ?>
</select><br><br>

<label for="skaits">Dalībnieku skaits:</label><br>
<input type="number" name="skaits" required min="1" max="5"><br><br>

</form>
<button type="submit">Nosutīt</button>

    
</body>
</html>