/*
    world.js
    Cameron Smith
    March 30 2019

    This file houses all javascript etc javascript functions
*/

//house the user's username
var user = "";

//given the id, append paragraph to that id
function appendParagraph(text, id){
    var para = document.createElement("P");
    var t = document.createTextNode(text);
    para.appendChild(t);
    document.getElementById(id).appendChild(para); 
}

//given the id, append text to that id
function appendText(text, id){
    let paragraph = document.getElementById(id);
    var t = document.createTextNode(text);
    paragraph.appendChild(t); 
}

function printFlag(element){
    alert(element);
    alert(flag[element]);
}

//source: https://stackoverflow.com/questions/951021/what-is-the-javascript-version-of-sleep
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
