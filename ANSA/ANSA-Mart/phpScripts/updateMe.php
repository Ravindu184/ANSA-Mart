<?php 
		require_once('DBConnection.php');

		if (isset($_POST['updateInfo'])) {
			
			$id=$_POST['u_id'];
			//$email=$_POST['email'];
			$contact=$_POST['contact'];
			//$home_city=$_POST['home_city'];
			//$created_date=$_POST['created_date'];
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			$re_password=$_POST['re_password'];

			if (empty(trim($contact)) || empty(trim($user_name))) {
				
			}
			else
			{
				if (empty(trim($password)) || empty(trim($re_password))) {
					
					$query="UPDATE admin SET contact_no='{$contact}',user_name='{$user_name}' WHERE id=$id";
					$result=mysqli_query($con,$query);
					if ($result) {
						
							header("Location:../aboutMe.php?msg=404");
					}
				}
				else
				{
					if ($password == $re_password) {
					
						$pwd=sha1($password);
						$query="UPDATE admin SET contact_no='{$contact}',user_name='{$user_name}',password='{$pwd}' WHERE id=$id";
						$result=mysqli_query($con,$query);

						if ($result) {
						
							header("Location:../aboutMe.php?msg=404");
						}
					}
					else
						header("Location:../aboutMe.php?msg=506");
				}	
			}	
		}
 ?>