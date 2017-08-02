<?php 

	function check_file($path) {

		if(file_exists($path)) {

			return true;
		} else {

			return false;
		}
	}
 ?>