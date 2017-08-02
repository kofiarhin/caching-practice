<?php 
	
	include "functions.php";

	if(isset($_POST['add_submit'])) {

		$name = $_POST['name'];

		if(empty($name)) {

			header("Location: ../index.php?empty");
			exit();
		}
		$path = "../data/names.txt";

		if(check_file($path)) {

			$handle = fopen($path, 'a');
			fwrite($handle, $name."\n");
			fclose($handle);

			echo "name added to file";
			header("Location: ../index.php");
		} else {

			$handle = fopen($path, 'w+');
			fwrite($handle, $name."\n");
			header("Location: ../index.php");
		}
	} 

 ?>