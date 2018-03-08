<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class>

	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
  				<a class="navbar-brand" href="#">Meme World</a>
  			</div>
	  		<div class="collapse navbar-collapse" id="bs-nav-demo">
	    		<ul class="nav navbar-nav">	    			
	      			<li class="active"><a href="browse.php">Browse</a></li>
	      			<li><a href="post.html">Post</a></li>
	      			<li><a href="message.html">Message a Meme Creator</a></li>
	      			<li><a href="#">Contact</a></li>
	      		</ul>
	      		<ul class="nav navbar-nav navbar-right">
	      			<li><a href="arch482-capstone.html">Login</a></li>
	      			<li><a href="#">Profile</a></li>
	      		</ul>
	  		</div>
	  	</div>
	</nav>
	<input class="button" type="submit" name="button" value="enter"/>
	<script> if(document.getElementById('button').clicked==true) {
							alert("button was clicked");
	} </script>
	

<?php 
		//$remoteImage = 'uploads';
		//$imginfo = getimagesize($remoteImage);
		//header("Content-type: {$imginfo['']}");
		//readfile($remoteImage);
		//$targetFile = "uploads/";
		//$targetFile = $targetFile . basename($_FILES["image"]["name"]);
		
		//$file = 'your_images.jpg';

    	//header('Content-Type: image/jpeg');
    	//header('Content-Length: ' . filesize($file));
    	//echo file_get_contents($file);
		//$file = 'http://students.washington.edu/liaofang/arch482/capstone/uploads/';
		//echo file_get_contents($file);
	
	
     $files = glob("uploads/*.*");
     
     function myFunction() {
    	  	$results = $link ->query($q2);
   			echo "Record updated successfully";
			
     }
    	
     for ($i=0; $i<count($files); $i++) {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

        $image = $files[$i];
        //print $image ."<br>";
        global $link;
    	include("dbconnect.php");
    	$link = new mysqli($server,$user,$password,$dbname);
    	//if ($link->connect_errno) {
    	//	die("Connection failed: " . $mylink->connect_error);
		//} else {
		//	print"Connection successful.";
		//}
		$path = substr($image,8);
		//echo $path;
		$q = "SELECT name, email FROM meme_information WHERE image_path= \"$path\"";
		
		$result = $link->query($q);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "Name: ". $row["name"] ."<br>";
    			echo "Email: ". $row["email"] ."<br>";
    		}
    	}
    	echo '<img src="'.$image.'" style="width:400px;height:400px;"></img>';
    	
		
    	//echo '<img id="click" src="heart-unclicked.png" style="width:50px;height:50px;">like</img>';
    	//echo '<p id="demo">Click me.</p>';
    	// echo '<html> <body> <script> document.getElementById("demo").onclick = function() {myFunction()}; </script></body> </html>';
    	// echo '<script>
//     		function helloooo() {
//     		alert("Heart was clicked");
//     		}
//     		</script>';

		// echo '<script>
// 				function myFunction() {
// 					$.ajax({
// 						type: "POST",
// 						data: { name: $("select[image_path="$path"]").val()},
// 						success:function( msg ) {
// 							alert("Data Saved: " + msg);
// 						}
// 					});
// 				}
// 			  </script>';
// 		
		echo '<input class="button" type="submit" name="button" value="enter"/>';
    	$q2 = "UPDATE meme_information SET likes=likes+1 WHERE image_path= \"$path\" ";
    	$lol=0;
    	
    	echo '<script> if(document.querySelector(\'.button\').clicked==true) {
							alert("button was clicked");
							} </script>';
		echo $lol;
    	if(lol ==1){
    		$results = $link ->query($q2);
    	}
    	echo '<button id="myBtn">Try it</button>';

		echo '<script>
			document.getElementById("myBtn").addEventListener("click", function(){
    		f1();
			});
			
			function f1(){
				$results = $link ->query($q2);
				}
				
		</script>';
    		  
    	
    	echo $path;
    	
    }
    	    		    
?>
</body>
</html>

