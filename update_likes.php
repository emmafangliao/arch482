<?php
include('connecttodb.php');

if(isset($_POST['id']))
	{
    $q2 = "UPDATE meme_information SET likes = likes + 1 WHERE id='".$_POST['id']."'";
    echo "The id is $id" . "<br>";
    $result = mysqli_query($link, $q2);
    echo "<br> this is the id" . "$result";
}

?>


