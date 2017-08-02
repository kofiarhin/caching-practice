<?php 

	if(isset($_GET['id'])) {	

		$id = $_GET['id'];

		$path = '../data/names.txt';

		if(file_exists($path)) {

			$data = file($path);

			unset($data[$id]);

			$handle = fopen($path, 'w+');

			foreach($data as $item) {

				fwrite($handle, $item);

			}

			fclose($handle);

			header("Location: ../index.php?");
		}

		
	}

 ?>