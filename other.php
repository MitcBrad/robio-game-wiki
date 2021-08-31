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
$sql = "SELECT * FROM others";
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
            echo "<div class='gameCard'><div class='gameCardInner'><a href='itemPage.php?item_id=", $row['item_id'], "' onclick='function assign(e){ header(\"Location: gamePage.php\")}'>";
            echo "<div class='imageHolder'> <img src='", $row['image_other'],  "'></div>";
            echo "<div class='textHolder'><br>", $row['name'], "</div></div></div>";
        }
        ?>
        <?php
        //Checks if the user is logged in and an admin, if they ARE an admin, the page adds the "Create game" button so the admin can create a new game item
        $isLoggedIn = isset($_SESSION['myusername']);
        if($isLoggedIn && $_SESSION['myusername']=='VectusOfArk'){

            echo "<div id='gameCardCreate' class='hover'><a href='createOther.php'>
            <div class='imageHolder'>
                <p id='plus'>
                    +
                </p>
            </div>
            <div class='textHolder'>
                <p id='add'>
                <br>
                    Add New Item
                </p>
            </div>
        </a></div>";
        }?>

    </div>
</div>

<?php
include ('php_externals/closers.php');
?>

</body>
</html>