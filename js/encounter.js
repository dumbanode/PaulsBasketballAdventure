/*
    encounter.js
    Cameron Smith
    March 30 2019

    This file houses all javascript funcitons relating to NPC encounters
*/


//start the default dialogue options for the given npc
function startEncounter(npc){
    //the second param encounter is the default dialogue option for every user
    encounter(npc, "encounter");
}

//this function will find the NPC's JSON file and generate textbox.php
function encounter(npc, encountername){
    //disable icons so the user can't click any overworld icons will in a conversation
    disableIcons();
    document.getElementById("encounterGenerated").innerHTML = "";

    //grab the JSON file, which should be the NPC's name dot JSON
    loadJSONObj(npc, function(entity){
        //populate textBox.php
        document.getElementById("encounterTitle").innerHTML = entity[encountername].title;
        document.getElementById("encounterText").innerHTML = entity[encountername].text;
        //the npc's image should be npc's name dot png
        document.getElementById("npcImg").src="images/" + npc +".png";
        //grab the dialogue options
        let options = entity[encountername].options;
        for(let i = 0; i < options.length; i++){
            let option = document.getElementById("option"+i);
            //if the flag specified by isVisible==0, make sure that option is hidden
            let toCheck = options[i].isVisible;
            if (checkFlag(toCheck) == 1) {
                option.innerHTML = options[i].text;
                option.setAttribute("onclick", options[i].onclick);
                option.hidden = false;
            } else {
                option.innerHTML = options[i].text;
                option.setAttribute("onclick", options[i].onclick);
                option.hidden = true;
            }
        }

        //For any options that aren't used, make them hidden
        for(let i = options.length; i < 4; i++){
            let option = document.getElementById("option"+i);
            option.hidden = true;
        }
    });
}

//enable the icons when an encounter ends
function endEncounter(){
    enableIcons();
    $('#encounterSub').collapse("hide");
}

function openEncounter(){
    $('#encounterSub').collapse("show");
}


//Depending on the flag, a certain encounter will be called
function checkAttributeEncounter(npc, encounternameTrue, encounternameFalse, attribute){
        if (checkFlag(attribute)){
            encounter(npc, encounternameFalse);
        } else {
            encounter(npc, encounternameTrue);
        }
    
}
