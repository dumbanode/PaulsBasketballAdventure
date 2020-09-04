<!-- 
    index.php 
    Cameron Smith
    March 31 2018

    This will house all the game assets including locationMenu.php, textMenu.php, etc
    and construct the game
                                                  .,
                                        .      _,'f----.._
                                        |\ ,-'"/  |     ,'
                                        |,_  ,--.      /
                                        /,-. ,'`.     (_
                                        f  o|  o|__     "`-.
                                        ,-._.,--'_ `.   _.,-`
                                        `"' ___.,'` j,-'
                                          `-.__.,--'

                    Sonic Sez: Take your time when learning computers!
-->
<!DOCTYPE html>
<html lang="en">
  <head>
<?php
session_start();
require_once("login/loginHelpers.php");
if(!isset($_SESSION['UserData']['Username'])){
	header("location:login/startPage.php");			
	exit;
}
?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--favicon-->
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!--Necessary Javascript Files-->
    <script src="js/world.js"></script>
    <script src="js/map.js"></script>
    <script src="js/flag.js"></script>
    <script src="js/stats.js"></script>
    <script src="js/location.js"></script>
    <script src="js/encounter.js"></script>
    <script src="js/form.js"></script>
    <script src="js/JSON.js"></script>
    <script src="js/battle.js"></script>
    <!--Font Awesome Framework-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Paul McCartney's Basketball Adventure</title>
  </head>
  <body onload="initiateMap('<?php echo htmlspecialchars($_SESSION['UserData']['Username']);?>');">

                    <!-- overlay that shows stats -->
                    <?php
                        include 'menu/stats.php';
                    ?>

    <!--gameContent will house the game and the stats bar-->
    <div id="gameContent">
        <div class="container">
            <div class="row">
                <div class="col-xl-12" id="map">

                    <!--Buttons to reset the game, save the game and log out-->
                    <div id="manageButtons">
                        <a href="#" onclick='resetFlags() '><i class="fas fa-sync-alt fa-2x"></i></a>
                        <a href="#" onclick="saveFlags()"> <i class="fas fa-save fa-2x"></i></a>
                        <a href="login/logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
                    </div>

                    <!-- PHP to load in all the map icons-->
                    <?php
                        include "menu/mapIcons.php";
                    ?>

                    <!--Screen that shows when visiting locations-->
                    <?php
                        include "menu/locationMenu.php";
                    ?>

                    <!--Screen that shows when encountering people-->
                    <?php
                        include "menu/textBox.php";
                    ?>

                    <!--Battle Screen-->
                    <?php
                        include 'menu/battleScreen.php';
                    ?>

                    <!-- Win Screen -->
                    <?php
                        include 'menu/winScreen.php';
                    ?>

                    <!-- Death Screen -->
                    <?php
                        include 'menu/deathScreen.php';
                    ?>

                    <!--Form Screen-->
                    <?php
                        include "menu/formMenu.php";
                    ?>

                    <!--=====Overworld Map=====-->
                    <img src="overworld/map1.png" class="img-responsive" id="mapImg" style="width:100%;" alt="Responsive image">
                </div>
            </div>

     </div>

        <!--=====Mobile Menu only visible on mobile screens (DID NOT FINISH)=====
           <div id="mobileMenu" class=" d-md-none d-lg-none d-xl-none">
                <div class="row">
                      <h1>This is the mobile menu</h1>
                      <div class="btn-group btn-group-lg" role="group">
                         <button type="button" class="btn btn-defualt">small</button>
                         <button type="button" class="btn btn-defualt">medium</button>
                         <button type="button" class="btn btn-defualt">large</button>
                      </div>
                  </div>
                <div class="row">
                   <h2>Here's a list of things you can do</h2>
                   <ul>
                       <li><a href="#cheeseSub" data-toggle="collapse">Buy Cheese</a></li>
                       <li><a href="#">See a movie</a></li>
                       <li><a href="#">Go into abandoned building</a></li>
                       <li><a href="#">Talk to civilian</a></li>
                   </ul>
               </div>
           </div>
       </div>
        -->
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
