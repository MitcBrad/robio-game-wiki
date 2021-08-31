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
require('php_externals/database.php');

$idVar = filter_input(INPUT_GET, "game_id", FILTER_SANITIZE_NUMBER_INT);

$sql="DELETE FROM gamestock WHERE game_id=$idVar";
$query = $conn->query($sql);

echo $sql;

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

</body>
</html>