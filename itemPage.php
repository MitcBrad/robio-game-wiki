<?php
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
$page_title = "Game Page";

require_once('php_externals/database.php');

//retrieve user id from query string
$alabama = filter_input(INPUT_GET, 'item_id', FILTER_SANITIZE_NUMBER_INT);

//displays all data from the gamestock table where the game id is the value of the variable alabam
$sql = "SELECT * FROM others WHERE item_id = '$alabama'";
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>

<?php
include ("php_externals/header.php");

?>

<div class="contentGamePage">
    <div class="catalogGamePage">
        <?php
        require_once('php_externals/database.php');
        //displays all the details of a single game as referenced by $row[]
        while (($row = $query ->fetch_assoc()) !== NULL){

            $firstpart = substr($row['text_other'], 0, 99);
            $url = substr($row['text_other'],99);
            echo "<div class='container'>";
            echo "<div class='gamePage'>";
            echo "<div class='imageHolderGP'> <img src='$row[image_other]'></div>";
            echo "<div class='textHolderGP'>$row[name]</div>";
            echo "<div class='descriptionGP'>$firstpart";
            echo "<br>";
            echo "<div id='pls'><a href='$url'>$url</a></div></div>";



            $isLoggedIn = isset($_SESSION['myusername']);
            if($isLoggedIn && $_SESSION['myusername']=='VectusOfArk' || $isLoggedIn && $_SESSION['myusername']=='Sqnsitive' || $isLoggedIn && $_SESSION['myusername']=='MrZued'  ){
                echo "<div id='theEditButton' class='editHolder'><div class='editButton'><a href='editingGame.php?game_id=", $row['game_id'],"' onclick='function assign(e){ header(\"Location: editingGame.php\")}'>","EDIT INFO</a></div></div>";
            }
            else{}
        }
        ?>
    </div>
</div>
</div>
<?php
include ('php_externals/closers.php');
?>

</body>
</html>
