<?php
session_start();

require('php_externals/database.php');


$user = $_SESSION['myusername'];

if ($_POST['name'] <> NULL){
    $sql="UPDATE users SET Name='$_POST[name]' WHERE username='$user'";
    $query = $conn->query($sql);
}
if ($_POST['Phone'] <> NULL){
    $sql="UPDATE users SET phone_number='$_POST[Phone]' WHERE username ='$user'";

    $query = $conn->query($sql);
}
if ($_POST['Email'] <> NULL){
    $sql="UPDATE users SET Email='$_POST[Email]' WHERE username = '$user'";

    $query = $conn->query($sql);
}
if ($_POST['username'] <> NULL){
    $sql="UPDATE users SET username='$_POST[username]' WHERE username = '$user'";

    $query = $conn->query($sql);

    $_SESSION['myusername'] = $_POST['username'];
}
if ($_POST['password'] <> NULL){
    $sql="UPDATE users SET Password='$_POST[password]' WHERE username = '$user'";

    $query = $conn->query($sql);
}


echo "<br>";

$query = $conn->query($sql);


if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}



sleep(2);

header("Location: myAccount.php");
?>