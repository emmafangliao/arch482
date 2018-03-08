<?php

global $link;   

include("dbconnect.php"); // define those key variables
                  
$link = new mysqli($server,$user,$password,$dbname);

if ($link->connect_errno) {
    die("Connection failed: " . $link->connect_error);
} else {
	print"Connection successful.";
}

?>