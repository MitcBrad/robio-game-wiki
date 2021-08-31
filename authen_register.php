<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
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

    $name = filter_input(INPUT_POST, "Name", FILTER_SANITIZE_STRING);
    $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL);

    $sql="SELECT Email FROM users";
$query = $conn->query($sql);
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
$count = 0;
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count=0){
    $sql="INSERT INTO users (Name, username, Password, Email) VALUES ('$_POST[Name]', '$_POST[username]','$_POST[password]','$_POST[Email]')";
    $query = $conn->query($sql);

    if (!$query) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        exit;
    }
    sleep(2);
    header('location: index.php');
}
else{
    echo "<script type='text/javascript'>alert('E-mail already in use.')</script>";
    header('location: login.php');
}



?>

</body>
</html>