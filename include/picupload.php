<?php
if ($_POST["cstatus"] === "Operator")
{
	$target_dir_O = "./bootstrap/operator_pic/";
	$target_file_O = $target_dir_O . basename($_FILES["operatorpic"]["name"]);
	$uploadOk_O = 1;
	$truelocation_O = "https://tricyclefranchisingsorsogon.online/ph/bootstrap/operator_pic/".basename( $_FILES["operatorpic"]["name"]);

	$target_dir_D = "./bootstrap/driver_pic/";
	$target_file_D = $target_dir_D . basename($_FILES["driverpic"]["name"]);
	$uploadOk_D = 1;
	$truelocation_D = "https://tricyclefranchisingsorsogon.online/ph/bootstrap/driver_pic/".basename( $_FILES["driverpic"]["name"]);

	// Check if file already exists
	if (file_exists($target_file_O)) {
		echo "Sorry, file already exists.";
		$uploadOk_O = 0;
	}
	if (file_exists($target_file_D)) {
		echo "Sorry, file already exists.";
		$uploadOk_D = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk_O == 0) 
	{
		echo "Sorry, your file was not uploaded.";
		return (false);
	// if everything is ok, try to upload file
	} 
	else 
	{
	   copy($_FILES["operatorpic"]["tmp_name"], $target_file_O);
	   echo "operator uploaded!";
	   echo "<input type='hidden' value='$truelocation_O' name='operatorpic'>";
	}
	if ($uploadOk_D == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	} 
	else 
	{
	   copy($_FILES["driverpic"]["tmp_name"], $target_file_D);
	   echo "driver uploaded!";
	   echo "<input type='hidden' value='$truelocation_D' name='driverpic'>";
	}
}
	else
	{

	$target_dir_O = "./bootstrap/operator_pic/";
	$target_file_O = $target_dir_O . basename($_FILES["operatorpic"]["name"]);
	$uploadOk_O = 1;
	$truelocation_O = "https://tricyclefranchisingsorsogon.online/ph/bootstrap/operator_pic/".basename( $_FILES["operatorpic"]["name"]);

	// Check if file already exists
	if (file_exists($target_file_O)) {
		echo "Sorry, file already exists.";
		$uploadOk_O = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk_O == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	} 
	else 
	{
	   copy($_FILES["operatorpic"]["tmp_name"], $target_file_O);
	   echo "operator uploaded!";
	   echo "<input type='hidden' value='$truelocation_O' name='operatorpic'>";
	   echo "<input type='hidden' value='NULL' name='driverpic'>";
	}
	}
?>