<?php
require('php_externals/database.php');


$idVar = filter_input(INPUT_GET, "game_id", FILTER_SANITIZE_NUMBER_INT);


if ($_POST[name] <> NULL){
    $sql="UPDATE gamestock SET name='$_POST[name]' WHERE game_id=$idVar";
    $query = $conn->query($sql);
}
if ($_POST[description] <> NULL){
    $sql="UPDATE gamestock SET description='$_POST[description]' WHERE game_id=$idVar";
    $query = $conn->query($sql);
}
if ($_POST[rarity] <> NULL){
    $sql="UPDATE gamestock SET Rarity='$_POST[rarity]' WHERE game_id='$idVar'";
    $query = $conn->query($sql);
}
if ($_POST[image] <> NULL){
    $sql="UPDATE gamestock SET image='$_POST[image]' WHERE game_id=$idVar";
    $query = $conn->query($sql);
}
if ($_POST[image_provider] <> NULL){
    $sql="UPDATE gamestock SET image_provider='$_POST[image_provider]' WHERE game_id=$idVar";
    $query = $conn->query($sql);
}
if ($_POST[desc_provider] <> NULL){
    $sql="UPDATE gamestock SET desc_provider='$_POST[desc_provider]' WHERE game_id=$idVar";
    $query = $conn->query($sql);
}


echo "<br>";
echo $sql;

$query = $conn->query($sql);


if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}



sleep(2);

header("Location: index.php");
?>