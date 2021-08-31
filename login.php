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
    <meta name="description" content="Shop with Best Direct online, pioneers in unique and innovative products for the Home, Cleaning, Kitchen, DIY and Health &amp; Fitness. The lowest prices on the Internet one click away. Take advantage of our delivery facilities and the constant offers we do for you.">
    <link rel="icon" type="image/x-icon">
    <title>Ro-Bio: Remastered</title>
    <link rel="shortcut icon" type="image/png" href="https://cdn.discordapp.com/attachments/581656363424415747/590923673909723167/eqw.png"/>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>

<?php
$isLoggedIn = isset($_SESSION['myusername']);
if($isLoggedIn){

    header('location: index.php');

}

$page_title = "Game Page";

require_once('php_externals/database.php');

//retrieve user id from query string
$alabama = filter_input(INPUT_GET, 'game_id', FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * FROM gamestock WHERE game_id = '$alabama'";
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
<!-- HEADER SECTION -->
<?php
include ("php_externals/header.php");

?>
<div class="contentGamePage">
    <div class="catalogGamePage">
<div class="loginHolder">
    <div class="loginInner">
<!--        Register user part of login page-->
        <div class="innerLogLeft">
            <form id="login-form" method="post" action="authen_register.php" class="registerForm">

                <p class="registeredCustomers">NEW Players</p>
                <div class="leftSideDivider"></div>
                <p class="floatedTextRight">If you are new here, please sign up!</p>
                <br>
                <br>
                <br>
                <div class="sideBySide">
                    <p class="loginStuff">Name <a>*</a></p>
                    <input type="text" name="Name" class="loginStuff">
                </div>
                <div class="sideBySide">
                <p class="loginStuff">Username <a>*</a></p>
                <input class="loginStuff" name="username"></div>
                <div class="sideBySide">
                <p class="loginStuff">Password <a>*</a></p>
                    <input class="loginStuff" name="password" type="password" required></div>
                <div class="sideBySide">
                <p class="loginStuff">Email <a>*</a></p>
                    <input class="loginStuff" name="Email" type="email" required ></div>
                <br>
                <br>
                <br>
                <div class="leftSideDivider"></div>
                <input type="submit" value="SIGN UP" class="loginButton">
            </form>
        </div>
<!--        Login for existing users for login part of login page-->
        <div class="innerLogRight">
            <form id="the-login-form" method="post" action="authen_login.php">

            <p class="registeredCustomers">Current Players</p>
            <div class="rightSideDivider"></div>
            <p class="floatedTextRight">If you have an account with us, please log in.</p>
            <br>
            <br>
            <br>
            <p class="loginStuff">Username <a>*</a></p>
            <input class="loginStuff" name="username" id="username"><br>
            <br>
            <br>
            <p class="loginStuff">Password <a>*</a></p>
            <input class="loginStuff" name="Password" id="Password" type="password">


            <div class="rightSideDivider dividerMargin"></div>
            <input type="submit" value="LOGIN" class="loginButton">
            </form>
        </div>

    </div>
</div>
    </div>
</div>



<!-- bottom table of contents section -->




<script type="text/javascript" src="js/script.js"></script>

</body>
</html>