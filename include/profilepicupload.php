<?php
	$target_dir_O = "./bootstrap/profile_pic/";
	$target_file_O = $target_dir_O . basename($_FILES["profile_pic"]["name"]);
	$uploadOk_O = 1;
	$truelocation_O = "https://tricyclefranchisingsorsogon.online/ph/bootstrap/profile_pic/".basename( $_FILES["profile_pic"]["name"]);

	// Check if file already exists
	if (file_exists($target_file_O)) {
	
		$uploadOk_O = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk_O == 0) 
	{
		
	} 
	else 
	{
	   copy($_FILES["profile_pic"]["tmp_name"], $target_file_O);
	}
?>