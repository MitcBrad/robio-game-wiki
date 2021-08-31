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
$page_title = "Edit Page";


require_once('php_externals/database.php');

//retrieve user id from query string
$myVar = filter_input(INPUT_GET, 'game_id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM gamestock WHERE game_id = '$myVar'";
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
            <a class='delete' href="deleteGame.php?game_id=<?php echo $myVar ?>" onclick='function assign(e){ header("Location: editingGame.php")}'>Delete Virus</a>
<!--        form for editing the contents of a game-->
        <form method="post" action="edit_conf.php?game_id=<?php echo $myVar ?>">
            <?php
            //appends all the different values of the single game as they're referenced
        while (($row = $query ->fetch_assoc()) !== NULL){
            echo "<div class='container'>";
            echo "<div class='gamePage'>";
            echo "<div class='imageHolderGP'> <img src='$row[image]'></div>";
            echo "<div class='textHodlerGP'><input type='text' name='image' id='image' placeholder='$row[image]'>";
            echo "<div class='textHolderGP'><input name='name' placeholder='", $row['name'], "' id='name' type='text'>","</div>";
            echo "<div class='descriptionGP'><textarea placeholder='", $row['description'] ,"' name='description' id='description' type='text' style='height: 200px; width: 400px'>", "</textarea></div>";
            echo "<div class='textHolderGP'><input type='text' name='rarity' id='rarity' placeholder='$row[Rarity]'></div>";
            echo "<div class='textHolderGP'><input type='text' name='image_provider' id='image_provider' placeholder='$row[image_provider]'></div>";
            echo "<div class='textHolderGP'><input type='text' name='desc_provider' id='desc_provider' placeholder='$row[desc_provider]'></div>";
            echo "<button type='submit' value='submit'>Confirm</button>";
        }
        ?>
        </form>
    </div>
</div>
<?php
include ('php_externals/closers.php');
?>

</body>
</html>