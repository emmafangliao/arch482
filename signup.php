<?php 
	
	if(isset($_POST["submit"])) {
	
		global $link;
   		include("dbconnect.php");
    	$link = new mysqli($server,$user,$password,$dbname);
    	if ($link->connect_errno) {
    		die("Connection failed: " . $link->connect_error);
		} else {
			echo"Connection successful.";
		}
		
		$uname = $_POST["new-uname"];
		$email = $_POST['new-email'];
		$psw = password_hash($_POST['psw'], PASSWORD_BCRYPT);
		
		
		$q = "INSERT INTO user_information(username, password, email) 
				VALUES (\"$uname\", \"$psw\", \"$email\")";
				
		if ($link->query($q) === TRUE) {
    		echo "New account created successfully";
		} else {
    		echo "Error: " . $q . "<br>" . $link->error;
		}
		echo '<a href="arch482-capstone.html"> Login to see your profile </a>';
	} else {
		echo 'not working';
	}
?>
				
		