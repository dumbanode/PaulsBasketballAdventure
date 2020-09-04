//    JSON.js 
//    Cameron Smith
//    March 29 2018

//    this file houses all js functions related to manipulating JSON files


//AJAX to load resources from the web server
//majority of this code is used from: https://www.w3schools.com/js/tryit.asp?filename=tryjs_ajax_xmlhttp
function loadDoc(resource, callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        callback(this.responseText);
      }
    };
    xhttp.open("GET", resource, true);
    xhttp.send();
}

//function to load JSON files
async function loadJSONObj(name, callback) {
    loadDoc('JSON/'+ name + '.json', function(data){
          let myJSON = data;
          let entity = JSON.parse(myJSON);
          callback(entity)
    });
}
