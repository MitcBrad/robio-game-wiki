<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<?php
$page_title = "Results Page";
require('php_externals/database.php');
$current_page = "Search Results";

$searchResult = filter_input(INPUT_POST, "searchbar", FILTER_SANITIZE_STRING);

//shows all games where the title includes the search result in any part of the title
$sql = "SELECT * FROM gamestock WHERE name LIKE '%$searchResult%'";
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




</body>
</html>