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
        <?php
        //displays all the details of a single game as referenced by $row[]

        while (($row = $query ->fetch_assoc()) !== NULL){
            $taco = $row['Rarity'];
            echo "<div class='container'>";
            echo "<div class='gamePage'>";
            echo "<div class='imageHolderGP'> <img src='$row[image]'></div>";
            echo "<div class='textHolderGP'>$row[name]</div>";
            echo "<div class='descriptionGP'>$row[description]</div>";
            if($row['Rarity']=="Uncommon"){
                echo "<div class='priceHolder'>Rarity: &nbsp<div class='rarityUncommon'>", $row['Rarity'], "    </div></div><br>";
            };
            if($row['Rarity']=="Rare"){
                echo "<div class='priceHolder'>Rarity: &nbsp<div class='rarityRare'>Rarity: ", $row['Rarity'], "</div>    </div><br>";
            };
            if($row['Rarity']=="Common"){
                echo "<div class='priceHolder'>Rarity: &nbsp<div class='rarityCommon'>", $row['Rarity'], " </div>   </div><br>";
            };
            if($row['Rarity']=="Unknown"){
                echo "<div class='priceHolder'>Rarity: &nbsp<div class='rarityUnknown'>", $row['Rarity'], "  </div>  </div><br>";
            };
            echo "<div class='textHolder'>Description Provided By: &nbsp", "$row[desc_provider]</div>";
            echo "<div class='textHolder'>Image Provided By: &nbsp","$row[image_provider]<br><br></div>";

    $isLoggedIn = isset($_SESSION['myusername']);
    if($isLoggedIn && $_SESSION['myusername']=='VectusOfArk' || $isLoggedIn && $_SESSION['myusername']=='Sqnsitive' || $isLoggedIn && $_SESSION['myusername']=='MrZued'  ){
    echo "<div id='theEditButton' class='editHolder'><div class='editButton'><a href='editingGame.php?game_id=", $row['game_id'],"' onclick='function assign(e){ header(\"Location: editingGame.php\")}'>","EDIT INFO</a></div></div>";
    }

else {}
        }
        ?>
        <div class="sim">
    <?php

    if($taco == 'Uncommon'){echo "<h1 class='tacoGreen'>Other $taco Viruses</h1>";}
    if($taco == 'Rare'){echo "<h1 class='tacoBlue'>Other $taco Viruses</h1>";}
    if($taco == 'Common'){echo "<h1 class='tacoGray'>Other $taco Viruses</h1>";}
    if($taco == 'Unknown'){echo "<h1 class='tacoRed'>Other $taco Viruses</h1>";}
    ?>
        <div class="similarHolder">
            <?php
            require_once('php_externals/database.php');
            $current_page = "";

            //Establishes the connection to the database along with error handling
            $sql = "SELECT * FROM gamestock WHERE Rarity = '$taco' AND NOT game_id = '$alabama'";
            $query = $conn->query($sql);
            if (!$query) {
                $errno = $conn->errno;
                $errmsg = $conn->error;
                echo "Selection failed with: ($errno) $errmsg<br/>\n";
                $conn->close();
                exit;
            }
            ?>
            <?php

            while (($row = $query ->fetch_assoc()) !== NULL){
                echo "&nbsp<div class='miniCards marquee'><div class='miniGCI'><a href='gamePage.php?game_id=", $row['game_id'], "' onclick='function assign(e){ header(\"Location: gamePage.php\")}'>";
                echo "<div class='miniImageHolder'> <img src='", $row['image'],  "'></div>";
                echo "<div class='miniTextHolder'>", $row['name'], "</div></div></a></div><div class='spacer'></div>";
            }


            ?>
            <br>

        </div></div>
        <div class="comments">
            <div class="comHeader"><div class="label"><h1>COMMENTS</h1></div></div>
            <div class="commentDivider"></div>

<!--            add comment VVVV-->
            <?php
            require_once('php_externals/database.php');
            $current_page = "";

            //Establishes the connection to the database along with error handling
            $sql = "SELECT game_id FROM gamestock WHERE game_id = '$alabama'";

            $query = $conn->query($sql);
            if (!$query) {
                $errno = $conn->errno;
                $errmsg = $conn->error;
                echo "Selection failed with: ($errno) $errmsg<br/>\n";
                $conn->close();
                exit;
            }

            while (($row = $query ->fetch_assoc()) !== NULL) {
                $isLoggedIn = isset($_SESSION['myusername']);
                if ($isLoggedIn) {
                    echo "<form action='add_comment.php?game_id=$row[game_id]' method='post' class='createInputs'>";
                    echo "<textarea  maxlength='248' id='comments' name='comments' class='commentsInput' placeholder='Write a comment...'></textarea>";
                    echo "<br><span id='chars'>248</span> &nbsp <a href='add_comment.php?game_id=$row[game_id]'><button type='submit' value='submit'>ADD COMMENT</button></a></form>";
                } else {
                    echo "<div class='createInputs'><textarea disabled maxlength='248' id='comments' name='comments' class='commentsInput' placeholder='Log in to comment.'></textarea></div>";
                }
            }

            ?>
            <div class="theComments">
                <?php
                require_once('php_externals/database.php');
                $current_page = "";

                //Establishes the connection to the database along with error handling
                $count = 0;
                $sql = "SELECT * FROM comments WHERE post_id = '$alabama' ORDER BY time DESC";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);

                $query = $conn->query($sql);
                if (!$query) {
                    $errno = $conn->errno;
                    $errmsg = $conn->error;
                    echo "Selection failed with: ($errno) $errmsg<br/>\n";
                    $conn->close();
                    exit;
                }

                if ($count != 0) {
                while (($row = $query ->fetch_assoc()) !== NULL) {
                    echo "<div class='comment'><div class='poster'>&nbsp $row[comment_author]</div><br>";
                    echo "<div class='getInLine'><div class='commentContent'><p>\"$row[comment_text]\"</p></div></div>";
                    echo "<div class='timestamp'>$row[time]</div></div>";
                }}
                else {
                    echo "<div class='comment'><div class='poster'>No comments yet.</div><br>";
                }
                ?>
            </div>


        </div>
    </div>
    </div>
</div>
<?php
include ('php_externals/closers.php');
?>

<script src="lib/jquery-3.3.1.min.js"></script>
<script src="app/script.js"></script>
</body>
</html>
