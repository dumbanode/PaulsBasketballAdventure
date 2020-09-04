
<?php
	//include db connection stuff
	require_once("dbinfo.inc");
	
	function password_encrypt($password){
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format.$salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}	
	
	function generate_salt($length){
		//generate pseudo random string (good enough)
		//returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));
		
		//convert it to base 64 (valid chars are [a-zA-Z0-0./] )
		$base64_string = base64_encode($unique_random_string);
		
		//remove the '+' characters, just replace with '.'
		$modified_base64_string = str_replace('+', '.', $base64_string);
		
		//truncate off just what we need
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}
	function password_check($password, $existing_hash){
		$hash = crypt($password, $existing_hash);
		if($hash === $existing_hash){
			return true;
		}else{
			return false;
		}
	}
	function createAccount($user, $pw){
		global $dbservername, $dbdatabase, $dbusername, $dbpassword;
				
		$myHandle;
		try{
			$myHandle = new PDO("mysql:host=$dbservername;dbname=$dbdatabase", $dbusername, $dbpassword);

		}catch(PDOException $e){
			$err .= "Connection failed :( :" . $e->getMessage() . "\n";
            echo $err;
            echo "\ndbservername is: ".$dbusername; 
			
		}		
		if($myHandle){
			//check that the user exists
			$myStmt = $myHandle->prepare("SELECT count(*) as total FROM members WHERE username=:u_name");
			$myStmt->bindParam(':u_name', $user);
			$myStmt->execute();
			
			$count = $myStmt->fetchColumn();
			if($count == 0){
				//username does not exist yet, so let's create it
                $flagSQL= "INSERT into flags(memberID) select m.id from members m where not exists (select 1 from flags f where m.id=f.memberID)";

				$sql = "INSERT into members(username, password) VALUES(:u_name, :p_word)";
				$insertStmt = $myHandle->prepare($sql);
				//hash the password
				$hashed_pw = password_encrypt($pw);
				$insertStmt->bindParam(':u_name', $user);
				$insertStmt->bindParam(':p_word', $hashed_pw);
				
				$insertStmt->execute();

				$insertStmt = $myHandle->prepare($flagSQL);
				$insertStmt->execute();
				return true;
			}else{
				return false;			
			}
		}
		$myHandle = null;
		return false;
	}
	 function attempt_login($userID, $passwordAttempt){
		//check that the user exists
		//connect to db, 
		global $dbservername, $dbdatabase, $dbusername, $dbpassword;
		$myHandle;
		try{
			$myHandle = new PDO("mysql:host=$dbservername;dbname=$dbdatabase", $dbusername, $dbpassword);

		}catch(PDOException $e){
			$err .= "Connection failed\n";
		}	
		
		if($myHandle){
			//make sure user exists
			$hashed_pw;
			$myStmt = $myHandle->prepare("SELECT  username, password, id FROM members WHERE username=:u_name");
			$myStmt->bindParam(':u_name', $userID);
			$myStmt->execute();
			$rslt = $myStmt->fetchAll();
			if(count($rslt) > 0){
				//good
				//we have the hashed password for this user
				//check it against the one they entered
				foreach($rslt as $row){
					//print_r($row);
					$hashed_pw = $row['password'];
				}
				
				//then check it
				if(password_check($passwordAttempt, $hashed_pw)){
					return true;
				}else{
					return false;
					
				}
			}else{
				return false;
			}
		}
		//something else bad happened
		//echo "handle null";
		return false;
		
	} 

?>
