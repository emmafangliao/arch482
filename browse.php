
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<style>
	p{text-align: center;}
	div.heart{position: relative; left: 330px;}
    </style>
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
	
		   
<?php 
	include("connecttodb.php");
	
    $files = glob("uploads/*.*");
    	
    for ($i=0; $i<count($files); $i++) {
        $image = $files[$i];
        $supported_file = array(
           		'gif',
                'jpg',
                'jpeg',
                'png'
        );
        $image = $files[$i];
		$path = substr($image,8);
		echo '<img src="'.$image.'" style="width:400px;height:400px;"></img>';
		$q = "SELECT name, email, id, likes FROM meme_information WHERE image_path= \"$path\"";
		
		$id=0;
		$result = $link->query($q);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = $row["id"];
				$imgid = "image_" . $row["id"];
				echo '<div class = "container">
						<div class = "row">
							<div class = "col-md-6 col-md-offset-3" style="padding-top:1%; margin-bottom:-1%;">
							
								<div class="col-md-6">
    								<a href="mailto:"'.$row["email"].'"?Subject=Hello%20I%20Love%20Your%20Meme" target="_top">
    								<img src="email_icon.png" style="width:50px;height:40px;">
    								</a>
    							</div>
    							
    							<div class="col-md-2">
    								<p id="'.$id.'" class="like" style="align: right;position: relative; left: 150px;font-size:1.5em;">' .$row["likes"] .' </p>";
    							</div>
    							
								<div class="col-md-4">
									<img id="'.$imgid.'" onclick="myFunction('.$id.',)" src="heart-unclicked.png" style="width:50px;height:50px;align:right;">
								</div>
								
    						</div>
    					</div>
    				</div>';
    			
    			
				echo "<p> Name: ". $row["name"] ."</p>";
    			echo "<p> Email: ". $row["email"] ."</p>";
    			
    			END;
    			
    			//echo "Id: ". $row["id"] . "<br>";
    				

    			
    			//echo $id;
    			
    			
    			echo ' <script>
				function myFunction(id, imgid) {
					$.ajax({
						type: "POST",
						url: "update_likes.php",
						data: {"increment_by": 1,"id": id, "imgid": imgid},
						success: function() {
							document.getElementById(imgid).src="heart-clicked.png";
							document.getElementById(id).innerHTML++;
						},
						error: function() {
							alert("doesnt work");
						},
					});
				}
				</script>';
    		}
    	}
    		
		
		

		  
    }
    	    		    
?>
</body>
</html>