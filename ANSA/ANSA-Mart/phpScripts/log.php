<?php 
		session_start();

		require_once('DBConnection.php');

		$rederect=0;
		if (isset($_GET['host'])) {
			$redirect=$_GET['host'];
		}

		
		$user;

		if (isset($_POST['log'])) {
			
			$user_name=$_POST['name'];
			$password=$_POST['password'];
			$account_type=$_POST['account_type'];

			if (empty(trim($user_name)) && empty(trim($password))) {
				
			}
			else
			{
				$user_n=mysqli_real_escape_string($user_name);
				$pwd=mysqli_real_escape_string($password);

				if ($account_type == "Admin") {
					
					$pword=sha1($pwd);
					$query="SELECT *FROM admin WHERE user_name='{$user_n}' and password='{$pword}' and account_type='Admin' and is_approved=1";
					$result=mysqli_query($con,$query);
					if ($result) {
						$user=mysqli_fetch_assoc($result);
						$_SESSION['user_name']=$user_name;
						$id=$user['id'];
						if ($redirect==1008) {
							header("Location:../addCart.php?");
						}
						else
							header("Location:../adminHome.php");
					}
				}

				if($account_type =="Buyer")
				{
					$pword=sha1($pwd);
					$query="SELECT *FROM admin WHERE user_name='{$user_n}' and password='{$pword}' and account_type='Buyer' and is_approved=1";
					$result=mysqli_query($con,$query);
					if ($result) {
						$user=mysqli_fetch_assoc($result);
						$_SESSION['user_name']=$user_name;
						$_SESSION['user_id']=$user['id'];

						if ($redirect==1008) {
							header("Location:../addCart.php");
						}
						else
							header("Location:../buyerHome.php");
					}
				}	
			}	
		}
 ?>