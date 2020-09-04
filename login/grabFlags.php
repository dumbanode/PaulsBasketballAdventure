<?php
/* 
    grabFlags.php 
    Cameron Smith
    March 29 2018

    This php script will go into the database and grab the flags associated with the user's account
*/
    require_once("dbinfo.inc");
    global $dbservername, $dbdatabase, $dbusername, $dbpassword;
    $myHandle;
    try{
        $myHandle = new PDO("mysql:host=$dbservername;dbname=$dbdatabase", $dbusername, $dbpassword);

    }catch(PDOException $e){
        $err .= "Connection failed\n";
    }

    if($myHandle){
        //select all the flag data from the flag table where the user id of the user matches the id of the table
        $myStmt = $myHandle->prepare("select f.* from members m inner join flags f on f.memberID = m.id and m.username=:uname");
        $myStmt->bindParam(':uname', $_GET['q']);
        $myStmt->execute();
        $rslt = $myStmt->fetchAll();
        $toEncode = $rslt[0];
        //echo back as JSON so it can be manipulated in javascript
        echo json_encode($toEncode);
    } 

?>
