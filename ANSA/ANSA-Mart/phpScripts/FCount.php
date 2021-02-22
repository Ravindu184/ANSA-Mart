<?php 
		require_once('DBConnection.php');

		$num_of_admins=0;

		$query="SELECT *FROM admin WHERE is_approved=1";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_admins=mysqli_num_rows($result);
		}

		//Getting Number of Pending Requests..
		$num_of_pending_requests=0;

		$query="SELECT *FROM buyer WHERE is_approved=0";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_pending_requests=mysqli_num_rows($result);
		}

		//Getting Number of users
		$num_of_users=0;

		$query="SELECT *FROM buyer WHERE is_approved=1";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_users=mysqli_num_rows($result);
		}

		//Getting number of Rack itms
		$num_of_racks=0;

		$query="SELECT *FROM products WHERE type='Rack'";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_racks=mysqli_num_rows($result);
		}

		//Getting number of Chairs itms
		$num_of_chair=0;

		$query="SELECT *FROM products WHERE type='Chairs'";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_chair=mysqli_num_rows($result);
		}


		//Getting number of Tables itms
		$num_of_tables=0;

		$query="SELECT *FROM products WHERE type='Table'";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_tables=mysqli_num_rows($result);
		}


		//Getting number of Canddles itms
		$num_of_canddles=0;

		$query="SELECT *FROM products WHERE type='Candles'";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_of_canddles=mysqli_num_rows($result);
		}


		//Getting number of Cart itms
		$num_cart_itms=0;

		$query="SELECT *FROM cart ";
		$result=mysqli_query($con,$query);

		if ($result) {
			$num_cart_itms=mysqli_num_rows($result);
		}
 ?>