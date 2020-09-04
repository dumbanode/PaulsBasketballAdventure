/*
    map.js
    Cameron Smith
    March 30 2019

    This file houses all javascript functions relating to map manipulation
*/

//house the current map we are on
var currMap = "";

//When the page first loads, call each of these functions
function initiateMap(username){
    //save the username to the javascript file
    saveUsername(username);

    //load the flags and stas from the database
    loadFlags();

    //load the stats into the stat bar
    loadStats();
}


//load the map passed in as an agrument
function loadMap(mapName){
    currMap = mapName;

    //the JSON file should be the name of the map dot JSON
    loadJSONObj('mapIcons', function(entity){
        //load the map
        let mapToLoad = entity[mapName].img;
        document.getElementById("mapImg").src="overworld/" + mapToLoad;
        //load the icons
        let icons = entity[mapName].icons;
        document.getElementById("iconDeclarations").innerHTML = "";
        //for each icon declared in the JSON file, we will duplicate an icon of that type and change 
        //the parameters of that icon to match the one in the JSON file
        for (let i=0; i<icons.length; i++){
            let toCheck = icons[i].isVisible;
            if (checkFlag(toCheck) != 0){
                let onclick = icons[i].onclick;
                appendIcon(onclick, icons[i].iconType, icons[i].top, icons[i].left);
            } else {
                //if the icon isn't visible, replace it with a skull
                appendIcon("", 'death', icons[i].top, icons[i].left);
            }
        }
    });
}

//if the flag isn't set, load the map
function loadAttributeMap(mapName, attribute){
    if (flag[attribute]==0){
        loadMap(mapName);
    } else {
        alert("ACCESS DENIED");
    }
}

//disable the overworld icons so they can't be clicked
function disableIcons(){
    let icons = document.getElementsByClassName('icon');
    for (let i =0; i<icons.length; i++){
        icons[i].style.pointerEvents="none";
        icons[i].style.cursor="default";
    }
}

function enableIcons(){
    let icons = document.getElementsByClassName('icon');
    for (let i =0; i<icons.length; i++){
        icons[i].style.pointerEvents="auto";
        icons[i].style.cursor="pointer";
    }
}

//take an icon of type typeOfIcon, and duplicate it with the attributes onclick, topPercent and leftPercent
function appendIcon(onclick, typeOfIcon, topPercent, leftPercent){
    //copy the icon needed
    let icon = document.getElementById(typeOfIcon+"Icon");
    let iconCopy = icon.cloneNode(true);

    //set the attributes
    iconCopy.setAttribute("onclick", onclick);
    iconCopy.getElementsByTagName("img")[0].style.top=topPercent + "%";
    iconCopy.getElementsByTagName("img")[0].style.left=leftPercent + "%";

    //append it to mapIcons.php
    document.getElementById('iconDeclarations').appendChild(iconCopy);
}


function changeMap(name){
    document.getElementById("mapImg").src="overworld/" + name +".png";
}

function reloadMap(){
    loadMap(currMap);
}


