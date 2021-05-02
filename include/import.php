<?php
	if ($_FILES["sqlpath"]["error"] > 0)
	{
		echo "Error: " . $_FILES["sqlpath"]["error"] . "<br />";
	}
	else
	{
		$path = $_FILES["sqlpath"]["tmp_name"];
		include('db_backup_library.php');
		$dbbackup = new db_backup;
		$dbbackup->connect("localhost","root","","testdb");
		$dbbackup->backup();
		if($dbbackup->db_import("$path"))
		{
			echo "Database Successfully Imported";
			{header("location:https://tricyclefranchisingsorsogon.online/ph/index.php/mycontroller/index");}
		}
	}
?>
	