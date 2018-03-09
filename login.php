<?php
	
	if(isset($_POST["submit"])) {
		echo 'sth';
		global $link;
   		include("dbconnect.php");
    	$link = new mysqli($server,$user,$password,$dbname);
    	if ($link->connect_errno) {
    		die("Connection failed: " . $link->connect_error);
		} else {
			echo"Connection successful.";
		}
		
		$uname = $_POST["uname"];
		echo $uname. "entered by user at log in <br>";
		
		
		$psw = $_POST['psw'];
		echo $psw. "password entered by user at log in  <br>";
		
		$q = "SELECT username, password FROM user_information WHERE username = \"$uname\"";
		$result = $link->query($q);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {	
				echo $row["password"]. "taken from database";
				if(password_verify($psw, $row["password"])){
					echo 'successfully logged in';
				} else {
					echo 'incorrect password';
				}
			}
		} 	
				
		
		echo '<a href="arch482-capstone.html"> Login to see your profile </a>';
	} else {
		echo 'not working';
	}
?>
				
	