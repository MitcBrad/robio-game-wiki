<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0, maximum-scale=1.0">
    <title>Game Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<?php
$page_title = "Game Page";

require_once('php_externals/database.php');

//retrieve user id from query string


$sql = "SELECT * FROM users WHERE username = '$_SESSION[myusername]'";
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
        <?php
        //Prints out the same thing as myAccount page, but with inputs this time so certain values that aren't referenced values can be changed
        while (($row = $query ->fetch_assoc()) !== NULL)
        {
            $tempName = $row['Name'];
            $nameLetter = substr($tempName,0,2);
            echo "<div class='accountContainer'><div class='accountInfo'>
<div class='genericImage'>
            <p class='nameLetters'>$nameLetter</p></div>";
            echo "<form action='acc_Edit_conf.php' method='post'>";
            echo "<div class='accountRows'><p class='labeling'>Name:</p><input type='text' name='name' placeholder='$row[Name]'></div>";
            echo "<div class='accountRows'><p class='labeling'>Username:</p><input type='text' name='username' placeholder='$row[username]'></div>";
            echo "<div class='accountRows'><p class='labeling'>Password:</p><input type='text' name='password' placeholder='$row[Password]' ></div>";
            echo "<div class='accountRows'><p class='labeling'>Email Address:</p><input type='email' name='Email' placeholder='$row[Email]'></div>";
            echo "</div><button type='submit'>CONFIRM</button></div></form>";
        }


        ?>


    </div>
</div>
<?php
include ('php_externals/closers.php');
?>

</body>
</html>