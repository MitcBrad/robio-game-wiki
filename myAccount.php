<?php

session_start();

?>
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
$page_title = "Game Page";

require_once('php_externals/database.php');

//retrieve user id from query string

//Depending on user's username, displays all of their details
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
        //shows user their account details
        while (($row = $query ->fetch_assoc()) !== NULL)
        {
            $tempName = $row['Name'];
            $nameLetter = substr($tempName,0,2);
            echo "<div class='accountContainer'><div class='accountInfo'>
<div class='genericImage'>
            <p class='nameLetters'>$nameLetter</p></div>";
            echo "<div class='accountRows'><p class='labeling'>Name:</p> $row[Name]</div>";
            echo "<div class='accountRows'><p class='labeling'>Username:</p> $row[username]</div>";
            echo "<div class='accountRows'><p class='labeling'>Password:</p> $row[Password]</div>";
            echo "<div class='accountRows'><p class='labeling'>Email Address:</p> $row[Email]</div>";
            echo "<a class='accountEdit' href='accountEdit.php'>Edit Information</a></div></div>";
        }


        ?>


    </div>
</div>
<?php
include ('php_externals/closers.php');
?>

</body>
</html>