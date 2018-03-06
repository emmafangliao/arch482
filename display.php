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
     for ($i=0; $i<count($files); $i++) {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

        $image = $files[$i];
        print $image ."<br>";
    	echo '<img src="'.$image.'" /><br />';
	?>