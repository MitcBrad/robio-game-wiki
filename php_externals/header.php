<section class="theHeader">

    <div class="headerHolder">
        <div class="header">
            <div class="headerContentHolder">
               <div class="logoImage">
                   <a href="index.php"><img src="https://cdn.discordapp.com/attachments/588340649711894548/590577239138238464/transparent.png"></a>
                </div>
                <div class="rightSideHeader">
                    <p>Ro-Bio Discord: <a href="https://discord.gg/g9pGwz3">Join Here</a></p>
                    <!-- input/search form -->

                    <form method="post" id="searchForm" action="searchResult.php">
                        <input id="searchbar" name="searchbar" class="input" type="search" placeholder="  Search entire wiki here...">
                    <i class="fas fa-search" class="i" id="search" style="position: absolute; margin-left: 560px;">
                    </i>
                    </form>


                    <div class="accountStuff">
                        <?php
                        $isLoggedIn = isset($_SESSION['myusername']);
                        if($isLoggedIn)
                        {
                            echo "<h3 id='account'><a href='myAccount.php'>My Account</a> | <a href='logout.php'>Logout</a></h3>";

                        }
                        else{
                            echo "<h3 id='account'><a href='login.php'>My Account | Login</a></h3>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="tabHolder">
            <div class="cat"><a href="about.php">ABOUT RO-BIO</a></div>
            <div class="cat"><a href="index.php">ALL VIRUSES</a></div>
            <div class="cat"><a href="rpg.php">RARE VIRUSES</a></div>
            <div class="cat"><a href="fps.php">UNCOMMON VIRUSES</a></div>
            <div class="cat"><a href="mmo.php">COMMON VIRUSES</a></div>
            <div class="cat"><a href="other.php">PERMITS & OTHER</a></div>
        </div>

    </div>

</section>


