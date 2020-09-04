<?php
/*
    saveFlags.php 
    Cameron Smith
    March 29 2018

    the function saveFlags() in flags.js will call this php file to save the user's
    current flags to the database
*/
	require_once("dbinfo.inc");
    //check that the user exists
    //connect to db, 
    global $dbservername, $dbdatabase, $dbusername, $dbpassword;
    $myHandle;
    try{
	    $myHandle = new PDO("mysql:host=$dbservername;dbname=$dbdatabase", $dbusername, $dbpassword);

    }catch(PDOException $e){
	    $err .= "Connection failed: " . $e->getMessage() . "\n";
    }	
    $test = $_GET['toSend'];
    $flag = json_decode($test, true);

    //update the flags in the database depending on the flags set inside flag.js
    if($myHandle){
        $myStmt = $myHandle->prepare("UPDATE flags f INNER JOIN members m on f.memberID=m.id and m.username=:uname SET f.isNotCult=:cult, f.didNotEatCheese=:cheese, f.didNotSeeMovie=:movie, f.notEducated=:educated, f.didNotWorkOut=:workOut, f.notRequestedByDork=:requested, f.conventionOption=:convention,  f.boughtFigure=:figure, f.yukikoAlive=:yukiko, f.teenAlive=:teen, f.nerdAlive=:nerd, f.catAlive=:cat, f.jockAlive=:jock, f.health = :health, f.attack=:attack;");


        //bind the flags and execute
        $myStmt->bindParam(':uname', $_GET['user']);
        $myStmt->bindParam(':cult', $flag['isNotCult']);
        $myStmt->bindParam(':cheese', $flag['didNotEatCheese']);
        $myStmt->bindParam(':movie', $flag['didNotSeeMovie']);
        $myStmt->bindParam(':educated', $flag['notEducated']);
        $myStmt->bindParam(':workOut', $flag['didNotWorkOut']);
        $myStmt->bindParam(':requested', $flag['notRequestedByDork']);
        $myStmt->bindParam(':convention', $flag['conventionOption']);
        $myStmt->bindParam(':figure', $flag['boughtFigure']);
        $myStmt->bindParam(':yukiko', $flag['yukikoAlive']);
        $myStmt->bindParam(':teen', $flag['teenAlive']);
        $myStmt->bindParam(':nerd', $flag['nerdAlive']);
        $myStmt->bindParam(':cat', $flag['catAlive']);
        $myStmt->bindParam(':jock', $flag['jockAlive']);
        $myStmt->bindParam(':attack', $_GET['attack']);
        $myStmt->bindParam(':health', $_GET['health']);
        $myStmt->execute();
    } 

?>
