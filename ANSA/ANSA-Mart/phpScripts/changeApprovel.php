<?php 
		require_once('DBConnection.php');

		$msg="Dear Sir/Madam,\n\nYour Request has been Approved.So you can Log into ANSA-Mart website Account.\n\nThank you for engaged with us.\nANSA-Mart Company.";
		$email="";
		if (isset($_POST['approve_user'])){
			
			$id=$_POST['u_id'];
			$appro=$_POST['approvel'];
			//$email=$_POST['email'];

			
				
				if ($appro =="true") {
				
						$query="UPDATE buyer SET is_approved=1 WHERE id=$id";
						$result=mysqli_query($con,$query);

						if ($result) {
							$query="SELECT *FROM buyer WHERE id=$id";
							$result=mysqli_query($con,$query);

							if ($result) {

								$data=mysqli_fetch_assoc($result);
								$email=$data['email'];

								$msg=wordwrap($msg,70);
								mail("$email", "Your Request has Approved", $msg);
								header("Location:../pendingRequest.php?msg=404");
							}
							else
								echo "no";
						}
				}
				if ($appro =="false") {
				
					$query="UPDATE buyer SET is_approved=0 WHERE id=$id";
					$result=mysqli_query($con,$query);

					if ($result) {
						header("Location:../pendingRequest.php?msg=506");
					}
				}
			
		}
 ?>