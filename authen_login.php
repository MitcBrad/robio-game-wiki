<!DOCTYPE html>
<?php
// Start the session
session_start();
?>





<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
require('php_externals/database.php');


$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING);


//if they login and have a username and password filled in
if (isset($username) and isset($password)){

    $count = 0;
    $query = "SELECT * FROM users WHERE username='$_POST[username]' AND Password='$_POST[Password]'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    echo $count;
    echo $query;

    //if there's something in the table matching their login stuff, they can log in
    if ($count == 1){

        echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
        $_SESSION["myusername"] = $username;
        echo $_SESSION["myusername"];

                header('Location: index.php');


    }
    //if not, the page refreshes
    else{
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        unset($_SESSION['myusername']);
        session_destroy();

        header("Location: login.php");

    }
}
//if they only fill out one, the other, or neither
else{
    echo "<script type='text/javascript'>alert('Please fill out both the login and password field.')</script>";
    header('location: index.php');
}


?>
</body>
</html>
