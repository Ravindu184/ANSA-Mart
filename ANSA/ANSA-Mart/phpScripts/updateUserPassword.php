<?php 
		require_once('DBConnection.php');

		if (isset($_POST['update_user_password'])) {
			
			$id=$_POST['u_id'];
			$password=$_POST['password'];
			$re_password=$_POST['re_password'];

			$pword1=mysqli_real_escape_string($con,$password);
			$pword2=mysqli_real_escape_string($con,$re_password);

			if ($pword1 == $pword2) {
				
				$pwd=sha1($pword1);

				$query="UPDATE buyer SET password='{$pwd}' WHERE id=$id";
				$result=mysqli_query($con,$query);

				if ($result) {
					
					header("Location:../buyerHome.php?msg=404");
				}
				else
					header("Location:../buyerHome.php?msg=506");
			}
			else
				header("Location:../buyerHome.php?msg=808");
		}
 ?>