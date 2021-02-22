<?php 
		require_once('DBConnection.php');

		if (isset($_POST['updateUsers'])) {
			
			$id=$_POST['u_id'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$address=$_POST['address'];
			$user_name=$_POST['user_name'];

			if (empty(trim($email)) || empty(trim($id)) || empty(trim($contact)) || empty(trim($address)) || empty(trim($user_name))) {
				
			}
			else
			{
				$query="UPDATE buyer SET email='{$email}',contact_no='{$contact}',address='{$address}',user_name='{$user_name}' WHERE id=$id";
				$result=mysqli_query($con,$query);

				if ($result) {
					
					header("Location:../viewAll.php?msg=404");
				}
				else
					header("Location:../viewAll.php?msg=506");
			}	
		}
 ?>