/*
    battle.js
    Cameron Smith
    March 30 2019

    This file houses all javascript funcitons relating to the battle style
*/

//The time it takes between messages in battles
var transitionTime = 500;
//How many people defeated in game
var peopleDead = 0;

var attack = 3;
var health = 10;

function showBattleScreen(){
    document.getElementById("battleScreen").removeAttribute("hidden");
}

//remove the battle text and hide the battle screen
function endBattle(){
    document.getElementById("battleScreen").innerHTML = "";
    document.getElementById("battleScreen").setAttribute("hidden", "true");;
}

//grab the npc information and start the battle
async function startBattle(npc){
    loadJSONObj(npc, function(entity){
        let enName = entity.entityName;
        let enAttack = entity.stats.attack;
        let enHealth = entity.stats.hp;
        //Start Battle
        battleBegin(enName, enAttack, enHealth, npc);
    });
}

//show the battle screen and begin the battle
async function battleBegin(enName, enAttack, enHealth, flagName){
    showBattleScreen();
    let curHealth = health;
    let enemyAttackMessage = enName + " attacks";
    let enemyAttackDisplay = "-" + enAttack;
    let yourAttackDisplay = "-" + attack;
    //i will keep track of which turn the user is on
    let i = 1;
    //Start Battle
    while (1){
        let turnMessage = "Turn "+ i; 
        appendParagraph(turnMessage, "battleScreen");
        await sleep(transitionTime);
        let message = "You have " + curHealth + " health left";
        appendParagraph(message, "battleScreen");
        await sleep(transitionTime);
        appendParagraph(enemyAttackMessage, "battleScreen");
        await sleep(transitionTime);
        appendParagraph(enemyAttackDisplay, "battleScreen");
        await sleep(transitionTime);
        curHealth = curHealth - enAttack;
        message = "You now have " + curHealth + " health left";
        appendParagraph(message, "battleScreen");

        //is the user dead?
        if (curHealth<=0){
            deathScreen();
            return -1;
        } else {
            await sleep(transitionTime);
            appendParagraph("You Attack", "battleScreen");
            await sleep(transitionTime);
            appendParagraph(yourAttackDisplay, "battleScreen");
            enHealth = enHealth - attack;
            if (enHealth < 0){
                enHealth = 0;
            }
            message = enName + " now has " + enHealth + " health left";
            await sleep(transitionTime);
            appendParagraph(message, "battleScreen");
            //is the enemy dead?
            if (enHealth<=0){
                winScreen();
                peopleDead++;
                flag[flagName+"Alive"]=0;
                endBattle();
                return 1;
            }
            await sleep(transitionTime);
            i++;
            document.getElementById("battleScreen").innerHTML = "";
        }
    }
}

//screen when the user defeats an enemy
function winScreen(){
    buffUp(3);
    healthUp(3);
    let win = document.getElementById('winScreen');
    win.removeAttribute("hidden");
}

//screen when the user is defeated
function deathScreen(){
    let death = document.getElementById('deathScreen');
    death.removeAttribute("hidden");
}

function removeWinScreen(){
    reloadMap();
    document.getElementById("winScreen").setAttribute("hidden", "true");;
}
