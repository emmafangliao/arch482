<?php
$targetFile = "uploads/";
$targetFile = $targetFile . basename($_FILES["image"]["name"]);
$uploaded = true;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploaded = true;
        echo "<br>" . "The file is temporarily stored: " . $_FILES['image']['tmp_name'] . "<br>";
    	echo "The file name was: " . $_FILES['image']['name'] . "<br>";
    	echo "The file type is: " . $_FILES['image']['type'] . "<br>";
    	echo "The file size is: " . $_FILES['image']['size'] . "<br>";
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	echo "Name: ". $name ."<br>";
    	echo "Email: ". $email ."<br>";
    	
    	
    	
    	
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile))
        {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.". "<br>";
            print '\n<img src="uploads/'.$_FILES["image"]["name"].'" style="width:400px;height:400px;">';
            print '<a href="http://students.washington.edu/liaofang/arch482/capstone/post.html">Go back to post page</a>';
        }
        else
        {
            echo "Sorry, there was an error uploading your file.";
        }

    	
    } else {
        echo "File is not an image.";
        $uploaded = false;
    }
    
    global $link;
    include("dbconnect.php");
    $link = new mysqli($server,$user,$password,$dbname);
    	if ($link->connect_errno) {
    		die("Connection failed: " . $mylink->connect_error);
		} else {
			print"Connection successful.";
		}
    $image_path = $_FILES['image']['name'];
    $likes = 0;
    
    $q = "INSERT  INTO meme_information (name, email, image_path, likes) 
    VALUES (\"$name\", \"$email\" , \"$image_path\" , \"$likes\")"; 
    
	if ($link->query($q) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $q . "<br>" . $link->error;
	}

}

?>