<?php
$errors = [];
$vards = "";
$epasts = "";
$kurss = "";
$skaits = 0;
$cena = 0;
$kursaNosaukums = "";
$rezultats = false; 

    require_once __DIR__ . '/data.php';
    require_once __DIR__ . '/functions.php';


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $vards = trim($_POST["vards"] ?? "");
    $epasts = trim($_POST["epasts"] ?? "");
    $kurss  = $_POST["kurss"] ?? "";
    $skaits = trim($_POST["skaits"] ?? "");

    if($vards === "") {
        $errors["vards"] = "Vārds ir obligāts";
    }

    if(!filter_var($epasts, FILTER_VALIDATE_EMAIL)) {
        $errors["epasts"] = "Ievadi derīgu epastu!";
    }

    if ($skaits <= 0 || $skaits >= 6) {
        $errors["skaits"] = "Skaitam jābūt veselam skaitlim no 1 līdz 5";
    }
    if (count($errors) == 0) {
        $rezultats = true;
}
    if ($kurss === "") {
    $errors["kurss"] = "Izvēlies kursu!";
}
    //nesapratu ka ar msaiviem tas jadara/atslegam
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kursu pieteikumu kalkulators</title>
</head>
<body>


<h1>Kursa pieteikums</h1>

<label>Kursu skaits: <?php echo count($kursi) ?></label>

<table>
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

<div class="form">
<h2>Pieteikuma forma:</h2>
<form method="POST" action="">
    <label for="vards">Vārds:</label><br>
<input type="text" name="vards" id="vards" placeholder="Vārds" required value="<?=htmlspecialchars($vards, ENT_QUOTES, 'UTF-8') ?>">
<?php echo $errors["vards"] ?? ""; ?>
<br><br>

<label for="epasts">E-pasts:</label><br>
<input type="text" name="epasts" id="epasts" placeholder="E-pasts" required value="<?=htmlspecialchars($epasts, ENT_QUOTES, 'UTF-8')?>">
<?php echo $errors["epasts"] ?? ""; ?>
<br><br>

<label for="kurss">Kurss:</label><br>
<select name="kurss" id="kursuIzvele" required>
    <option value="" disabled selected>Izvēlies kursu</option>
    <?php foreach($kursi as $kurs) { ?>
    <option value="<?php echo $kurs["kurss"] ?>"><?php echo $kurs["nosaukums"]?></option>

<?php    } ?>
</select><br><br>

<label for="skaits">Dalībnieku skaits:</label><br>
<input type="number" name="skaits" required min="1" max="5">
<?php echo $errors["skaits"] ?? ""; ?>
<br><br>

<button type="submit">Nosutīt</button>
</form>
</div>
<?php
// print_r (aprekins(25.00, 3));
[$starpsumma, $atlaide, $kopa] = aprekins($cena, $skaits);
//veljoprojam nav ne jausmas

// Es nesaprotu kada veida var fukciju dabut seit, man vienkarsi nav ne jausmas
?>

<?php if ($rezultats === true) { ?>
    <div class="rezultats">
        <h3>Pieteikuma aprēķins:</h3>
        <p>Vārds: <?php echo htmlspecialchars($vards); ?></p>
        <p>E-pasts: <?php echo htmlspecialchars($epasts); ?></p>
    </div>
<?php
    }?>

 <?php // print_r($errors); ?>
</body>
</html>