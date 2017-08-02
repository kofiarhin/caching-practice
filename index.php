<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Caching files</title>
</head>
<body>


	<?php 

		$conn = new mysqli('localhost', 'root', '', 'shopping cart');


		//get user data

		if(isset($_COOKIE['data'])) {

			$file = "data/info.txt";

			if(file_exists($file)) {


				$ser = file_get_contents($file);
				$data = unserialize($ser);

				echo "<pre>", print_r($data, true), "</pre>";
			}


		} else {


			$name = 'data';
			$value = uniqid('', true);
			$time = time();

			$file = "data/info.txt";

			if(file_exists($file)) {

				unlink($file);
			}

			$sql = "SELECT * FROM products";
			$result = $conn->query($sql);
			$check = $result->num_rows;

			if($check > 0) {
				while($row = $result->fetch_assoc()) {

					$data[] = $row;
				}

				$ser = serialize($data);
				$file = "data/info.txt";
				file_put_contents($file, $ser);

				//set cookie

				$name = 'data';
				$value = uniqid('', true);
				$time = time();

				setcookie($name, $value, $time + 10);

				echo "cookie data set";
			}

		}

	 ?>

	
</body>
</html>