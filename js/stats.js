//    stats.js 
//    Cameron Smith
//    March 29 2018

//    this file houses all js functions related to flags

//load the stats in the javascript file into the stats bar
function loadStats(){
    document.getElementById('healthBox').innerHTML = "HP: " + health;
    document.getElementById('attackBox').innerHTML = "Attack: " + attack;
}

function setHealth(amount){
    health = amount;
    loadStats();
}

function setAttack(amount){
    attack = amount;
    loadStats();
}

function buffUp(amount){
    attack+=amount;
    loadStats();
}

function healthUp(amount){
    health+=amount;
    loadStats();
}

