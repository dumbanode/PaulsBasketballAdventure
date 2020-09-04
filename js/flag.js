//    flag.js 
//    Cameron Smith
//    March 29 2018

//    this file houses all js functions related to flags

//flags
var flag = {};
flag['isNotCult']=1;
flag['didNotEatCheese']=1;
flag['didNotSeeMovie']=1;
flag['notEducated']=1;
flag['didNotWorkOut']=1;
flag['notRequestedByDork']=1;
flag['conventionOption']=0;
flag['boughtFigure']=0;
//death flags
flag['yukikoAlive']=1;
flag['teenAlive']=1;
flag['nerdAlive']=1;
flag['catAlive']=1;
flag['jockAlive']=1;



//grab the flags from the server
async function loadFlags(name) {
    var flagsGrabbed;
    loadDoc("login/grabFlags.php?q="+user, function(data){
            flagsGrabbed = data;
            temp = JSON.parse(flagsGrabbed, function(key, value){
				if (isNaN(key)){
					assignFlagValue(key, parseInt(value))
                	if (key == 'health'){
                   	    setHealth(parseInt(value));
                	}
                	if (key == 'attack'){
                        setAttack(parseInt(value));
                	}
				}
			});
       loadMap('map1');
    });
}




//this function is called when the game is reset
function resetFlags(){
    flag['isNotCult']=1;
    flag['didNotEatCheese']=1;
    flag['didNotSeeMovie']=1;
    flag['notEducated']=1;
    flag['didNotWorkOut']=1;
    flag['notRequestedByDork']=1;
    flag['conventionOption']=0;
    flag['boughtFigure']=0;
    //death flags
    flag['yukikoAlive']=1;
    flag['teenAlive']=1;
    flag['nerdAlive']=1;
    flag['catAlive']=1;
    flag['jockAlive']=1;
    reloadMap(currMap);
    attack = 3;
    health = 10;
    loadStats();
    alert("Game has been reset");
}


//save the flags to the server
async function saveFlags(name, callback) {
    let toSend = JSON.stringify(flag);
    loadDoc("login/saveFlags.php?user="+user+"&toSend="+toSend+"&attack="+attack+"&health="+health, function(data){
            alert("Game Saved!");
    });
}



//keep the username in the javascript code so it can be used later
function saveUsername(username){
    user = username;
}

function checkFlag(index){
    //some icons do not have an isvisible attribute attached to it because it never disappears
    //if it doesn't just return 1
    if (index){
        return flag[index];
    }else{
        return 1;
    }
}

function assignFlagValue(index, value){
    flag[index]=value;
}

function assign(index){
    flag[index]=0;
}

function deassign(index){
    flag[index]=1;
}

