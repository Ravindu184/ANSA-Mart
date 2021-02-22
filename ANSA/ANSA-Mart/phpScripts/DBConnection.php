<?php 
		$server="localhost";
		$user_name="root";
		$password="";
		$db="ansamart";

		$con=mysqli_connect($server,$user_name,$password,$db);

		if (!$con) {
			die("Unable to connect database");
		}
 ?>