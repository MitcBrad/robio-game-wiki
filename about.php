<?php

session_start();

require_once('php_externals/database.php');


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
$alabama = filter_input(INPUT_GET, 'game_id', FILTER_SANITIZE_NUMBER_INT);

//displays all data from the gamestock table where the game id is the value of the variable alabam
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

<?php
include ("php_externals/header.php");

?>

<div class="contentGamePage">
    <div class="catalogGamePage">
        <br><br>
        <img src="https://cdn.discordapp.com/attachments/581656363424415747/590727006849597441/unknown.png" alt="A young boy and his father enjoying a field trip to their local pharmacy.">
        <h1 class="aboutHeader">About Ro-Bio: Remastered</h1>
        <div class="division"></div>
        <p class="about">The original Ro-Bio game was created by the Roblox user MemeNicoi - most commonly referred to as just 'Nicoi' - in May of 2018. Due to the nature of that game, (it had broken several of Roblox's community guidelines due to its graphic depictions of human expirements and clinical trials if testing viruses on humans. not to mention their.. "gassing" method of resetting the chamber,) both the game, and MemeNicoi, were banned from Roblox. Nicoi has since left Roblox, but Sqnsitive along with his developer crew of MrZued as well as an unnamed - and very much disliked - scripter, started development on their own Ro-Bio project.</p>
        <br><br>
        <p class="about">Thus, in May of 2019, Ro-Bio: Remastered was released to tremendous success. At the time of this publication, (17:02PM, 19 May, 2019) Ro-Bio: Remastered has reached an astounding 80.1k+ place visits, as well as 2,932 favorites.</p>

        <p class="subheader">Remastered Trivia!</p>
        <div class="division"></div>

        <p class="subAbout">• &nbsp &nbsp There are currently <b>43</b> known viruses in Ro-Bio: Remastered!</p>
        <p class="subAbout">• &nbsp &nbsp Virus names are randomly generated. You will never find the same virus effect with the same name!</p>
        <p class="subAbout">• &nbsp &nbsp The original Ro-Bio game only had 3 testing chambers!</p>
        <p class="subAbout">• &nbsp &nbsp Ro-Bio (the original) was written entirely in English, even though the creator was from Brazil!</p>
        <p class="subAbout">• &nbsp &nbsp Ro-Bio: Remastered serves not only coffee, but also Koolaid, absolutely free!</p>
        <p class="subAbout">• &nbsp &nbsp In old version of the game, you can find unused props and models scattered outside the map!</p>

    </div>
</div>
</div>
<?php
include ('php_externals/closers.php');
?>

</body>
</html>
