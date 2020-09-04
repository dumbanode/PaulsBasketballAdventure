<!--
    mapIcons.php
    Cameron Smith
    March 29 2018

    This is where icons are added to the map screen
    On initiation, the js function loadMap() is called
    loadMap will look inside mapIcons.JSON, and grab the icons it needs to load depending on
    the parameter passed into loadMap(). 
    Depending on the icons it needs to load, it will copy the icon specified inside the hidden div and
    change attributes about that icon depending on what the JSON file specifies about that icon.
-->
<div id="iconDeclarations">

</div>

<div hidden>
    <a href="#" id="arrowIcon"><img src="icons/foot.png" class="icon" style="top:11%; left:56%;" alt="go to next map"></a>

    <a href="#encounterSub" data-toggle="collapse" id="encounterIcon"><img src="icons/person.png" class="icon" style="top:85%; left:35%;" alt="talk to a person"></a>

    <a href="#locationSub" data-toggle="collapse"  id="locationIcon"><img src="icons/location.png" class="icon" style="top:20%; left:72%;" alt="visit location"></a>

    <a href="#formSub" data-toggle="collapse"  id="formIcon"><img src="icons/location.png" class="icon" style="top:20%; left:72%;" alt="fillo out a form"></a>

    <a href="#" data-toggle="collapse"  id="deathIcon"><img src="icons/death.png" class="icon" style="top:20%; left:72%;" alt="a dead body"></a>
</div>
