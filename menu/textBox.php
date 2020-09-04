<!--
    textBox.php 
    Cameron Smith
    March 29 2018

    this menu will display dialogue options generated from the corresponding .JSON file
    The function encounter() in encounter.js will load in the .JSON content
-->
    <!--<div class="sub">-->
        <div id="encounterSub" class="collapse"> 
            <img src="images/cat.png" class="npc" id="npcImg" alt="non player character">
            <div class="textbox"> 
                <a href="#encounterSub" data-toggle="collapse"> 
                 </a>
                 <h3 class="npcTitle" id="encounterTitle">TITLE</h3>
         
                    <div id="encounterParagraphs">
                      <p id="encounterText"></p>
                      <p id="encounterGenerated"></p>
                    
                        <div id="options">
                          <a href="#" id="option0" onclick=""></a><br>
                          <a href="#" id="option1" onclick=""></a><br>
                          <a href="#" id="option2" onclick="" hidden></a><br>
                          <a href="#" id="option3" onclick="" hidden></a><br>
                        </div>
                 </div>
             </div> 
         </div>
    <!--</div>-->
