<?php

session_start();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <title></title>
</head>
<body>
<?php
require_once('php_externals/database.php');

$idVar = filter_input(INPUT_GET, "game_id", FILTER_SANITIZE_NUMBER_INT);
$comments = filter_input(INPUT_POST, "comments", FILTER_SANITIZE_STRING);


$sql="INSERT INTO comments (post_id, comment_text, comment_author) VALUES ($idVar, '$_POST[comments]','$_SESSION[myusername]')";

$query = $conn->query($sql);



if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}



sleep(2);

header("Location: gamePage.php?game_id=$idVar");

?>

</body>
</html>