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


$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$image = $_POST['image'];
$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
$rarity = filter_input(INPUT_POST, "rarity", FILTER_SANITIZE_STRING);
$desc_provider = filter_input(INPUT_POST, "desc_provider",  FILTER_SANITIZE_STRING);
$image_provider = filter_input(INPUT_POST, "image_provider", FILTER_SANITIZE_STRING);


$sql="INSERT INTO gamestock (image, name, description, desc_provider, image_provider) VALUES ('$image', '$name', '$description' , '$desc_provider', '$image_provider')";

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

</body>
</html>