<?php 
		session_start();
		require_once('DBConnection.php');

		$notify="";

		if (isset($_POST['submit_signup'])) {
			
			$full_name=$_POST['full_name'];
			$email=$_POST['email'];
			$contact_no=$_POST['contact'];
			$address=$_POST['address'];
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			$re_password=$_POST['re_password'];
			$is_approved=0;
			$is_deleted=0;
			$account_type="Buyer";


			if ($password == $re_password) {
				
				$pwd=sha1($password);

				$query="INSERT INTO buyer(full_name,email,contact_no,address,user_name,password,is_approved,is_deleted,account_type) VALUES('{$full_name}','{$email}','{$contact_no}','{$address}','{$user_name}','{$pwd}','{$is_approved}','{$is_deleted}','{$account_type}')";
				$result=mysqli_query($con,$query);

				if ($result) {
					
					$notify="404";
					
					header("Location:../signup.php?msg=".$notify);
				}
			}

			else
			{	
				
				$notify="506";
				
				header("Location:../signup.php?msg=".$notify);
			}	
		}
 ?>