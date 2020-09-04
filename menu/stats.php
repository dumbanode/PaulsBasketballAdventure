<!-- 
    stats.php 
    Cameron Smith
    March 29 2018

    this will house the player's stats, which will be updated using the function
    loadStats() in stats.js
-->
<div class="container" id="stats">
  <div class="row">
    <div class="col">
        <p id="username"><?php echo htmlspecialchars($_SESSION['UserData']['Username']);?></p>
    </div>
    <div class="col">
        <p id="healthBox"> </p>
    </div>
    <div class="col">
        <p id="attackBox"> </p>
    </div>
  </div>
</div>

