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

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile))
        {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            print '\n<img src="uploads/'.$_FILES["image"]["name"].'">';
        }
        else
        {
            echo "Sorry, there was an error uploading your file.";
        }

    	
    } else {
        echo "File is not an image.";
        $uploaded = false;
    }
}

//echo '<img src=' . $_FILES["file"]["name"] . '>';

?>