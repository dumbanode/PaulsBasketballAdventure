//    form.js 
//    Cameron Smith
//    March 29 2018

//    this file houses all js functions related to form menus

function formSub(){
    $('#formSub').collapse("show");
}

function hideFormSub(){
    $('#formSub').collapse("hide");
}

function grabExamDetails(){
    flag['notEducated']=0;
    var form = document.getElementById("exam");
    toAppend = form[8].value;
    hideFormSub(); 
    encounter('brian', 'afterExam');
    openEncounter();
    let reply = "Wow, you're one smart cookie! I don't even believe you need school! Here's a diploma for bachelor of whatever. Now if you don't mind me, I'm going to go home and " + toAppend;
    appendParagraph(reply, 'encounterGenerated');
}

