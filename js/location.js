//    location.js 
//    Cameron Smith
//    March 29 2018

//    this file houses all js functions related to locations

//encounter is the default option for all locations
function enterArea(location){
    area(location, "encounter");
}

//function to load location data into locationMenu.php
function area(location, encountername){
    //disable the icons so the user won't open any other menus
    disableIcons();

    //load the JSON file associated with the location
    //JSON file should be the name of the location dot JSON
    loadJSONObj(location, function(entity){
        //load in the information from the JSON file
        document.getElementById("locationTitle").innerHTML = entity[encountername].locationName;
        document.getElementById("locationText").innerHTML = entity[encountername].text;
        //the image of the location should be the name of the location dot png
        document.getElementById("locationImg").src="images/" + location +".png";
        //grab the location's dialogue options
        let options = entity[encountername].options;
        for(let i = 0; i < options.length; i++){
            //if the flag associated with isVisible isn't set, make sure that option is hidden
            let option = document.getElementById("locationOption"+i);
            let toCheck = options[i].isVisible;
            if (checkFlag(toCheck) != 0) {
                option.innerHTML = options[i].text;
                option.setAttribute("onclick", options[i].onclick);
                option.hidden = false;
            } else {
                option.innerHTML = options[i].text;
                option.setAttribute("onclick", options[i].onclick);
                option.hidden = true;
            }
        }

        //for each option not used, hide it
        for(let i = options.length; i < 4; i++){
            let option = document.getElementById("locationOption"+i);
            option.hidden = true;
        }
    });
}

function exitArea(){
    enableIcons();
    $('#locationSub').collapse("hide");
}
