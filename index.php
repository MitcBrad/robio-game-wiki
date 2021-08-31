<?php
// Start the session
session_start();


?>
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
$page_title = "Game Site";
require_once('php_externals/database.php');
$current_page = "";

//Establishes the connection to the database along with error handling
$sql = "SELECT * FROM gamestock";
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

//Navigation at the top of every page
include('php_externals/header.php');

?>

<div class="content">
<div class="catalog">
<?php

//echos a card for each item in the associative array
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
    if($row['Rarity']=="Unknown"){
        echo "<div class='priceHolder rarityUnknown'>", $row['Rarity'], "    </div>", "</a></div></div>";
    }

}
?>
    <?php
    //Checks if the user is logged in and an admin, if they ARE an admin, the page adds the "Create game" button so the admin can create a new game item
    $isLoggedIn = isset($_SESSION['myusername']);
    if($isLoggedIn && $_SESSION['myusername']=='VectusOfArk' || $isLoggedIn && $_SESSION['myusername']=='Sqnsitive' || $isLoggedIn && $_SESSION['myusername']=='MrZued'  ){

    echo "<div id='gameCardCreate' class='hover'><a href='createGame.php'>
            <div class='imageHolder'>
                <p id='plus'>
                    +
                </p>
            </div>
            <div class='textHolder'>
                <p id='add'>
                    Add New Virus
                </p>
            </div>
        </a></div>";
    }
    ?>
    
</div>
</div>

<?php
include ('php_externals/closers.php');
?>

</body>
</html>