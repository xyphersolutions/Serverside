<?php 
function connect_db(){
	static $connection;

	if (!isset($connection)) {
		$connection = mysqli_connect('localhost','root','','serverside_db');	
		}
		if ($connection===false) {	
			return mysqli_connect_error();
		}
		return $connection;
		}

		//conn3xtdibipassw0rd
 ?>