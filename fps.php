<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <title>Ro-Bio: Remastered</title>
    <link rel="shortcut icon" type="image/png" href="https://cdn.discordapp.com/attachments/581656363424415747/590923673909723167/eqw.png"/>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>

<?php
$page_title = "RPG";
require_once('php_externals/database.php');
$current_page = "";

//sorts all contents from index.php into game with just the genre of shooter
$sql = "SELECT * FROM gamestock WHERE Rarity = 'Uncommon'";
$query = $conn->query($sql);
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>

<?php
include('php_externals/header.php');

?>

<div class="content">
    <div class="catalog">
        <?php

        while (($row = $query ->fetch_assoc()) !== NULL){
            echo "<div class='gameCard'><div class='gameCardInner'><a href='gamePage.php?game_id=", $row['game_id'], "' onclick='function assign(e){ header(\"Location: gamePage.php\")}'>";
            echo "<div class='imageHolder'> <img src='", $row['image'],  "'></div>";
            echo "<div class='textHolder'>", $row['name'], "</div>";
            if($row['Rarity']=="Uncommon"){
                echo "<div class='priceHolder rarityUncommon'>", $row['Rarity'], "    </div>", "</a></div></div>";
            }
            if($row['Rarity']=="Rare"){
                echo "<div class='priceHolder rarityRare'>", $row['Rarity'], "    </div>", "</a></div></div>";
            }
            if($row['Rarity']=="Common"){
                echo "<div class='priceHolder rarityCommon'>", $row['Rarity'], "    </div>", "</a></div></div>";
            }

        }




        ?>
    </div>
</div>

<?php
include ('php_externals/closers.php');
?>

</body>
</html>