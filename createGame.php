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
require_once('php_externals/database.php');


?>


<?php
include('php_externals/header.php');
?>

<div class="content">
    <div class="catalog">
        <div class="container">
            <div class="gamePage">
                <div class="create">
                    <div class="creText"><br>
                    <h1>DOCUMENT NEW VIRUS</h1></div>
                    <br>
                    <div class="createForm">

<!--                        Form for admin to fill out and submit that creats a new game in the database-->
                        <form action="create_conf.php" method="post" class="createInputs">
                            <input type="text" id="name" name="name" class="virusInputs" placeholder="Virus Name">
                            <input type="text" id="image" class="virusInputs" name="image" placeholder="URL of Image">
                            <input type="text" id="rarity" class="virusInputs" name="rarity" placeholder="Common/Uncommon/Rare/NA">
                            <textarea id="description" name="description" class="virusInputs textarea" placeholder="Description"></textarea>
                            <input type="text" id="desc_provider" name="desc_provider" class="virusInputs" placeholder="Description Provider:">
                            <input type="text" id="image_provider" name="image_provider" class="virusInputs" placeholder="Image Provider:">
                            <button type="submit" class="addVirus">ADD VIRUS</button>
                        </form>

                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>