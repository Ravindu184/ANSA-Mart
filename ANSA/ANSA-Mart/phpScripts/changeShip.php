<?php
		require_once('DBConnection.php');

		if (isset($_POST['ship_user'])) {
		 		
		 		$id=$_POST['u_id'];
		 		$ship_value=$_POST['ship_item'];

		 		if ($id==0) {
		 			
		 			header("Location:../penddingCartItms.php?msg=1008");
		 		}
		 		else
		 		{
		 			if ($ship_value == "true") {
		 				
		 				$query="UPDATE ship SET is_shipped=1 WHERE id=$id";
		 				$res=mysqli_query($con,$query);

		 				if ($res) {
		 					
		 					header("Location:../penddingCartItms.php?msg=404");
		 				}
		 			}
		 			

		 			if ($ship_value == "false") {
		 				
		 				$query="UPDATE ship SET is_shipped=0 WHERE id=$id";
		 				$res=mysqli_query($con,$query);

		 				if ($res) {
		 					
		 					header("Location:../penddingCartItms.php?msg=506");
		 				}
		 			}
		 		}	
		 } 
 ?>