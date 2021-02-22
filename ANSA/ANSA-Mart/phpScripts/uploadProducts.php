<?php 
		require_once('DBConnection.php');

		if (isset($_POST['upload_product_details'])) {
			
			$type=$_POST['product_type'];
			$price=$_POST['product_price'];
			$status=$_POST['product_status'];
			$file_name=$_FILES['file']['name'];
			$target_dir="uploads/";

			if (empty($type) || empty(trim($price)) || empty($status)) {
				header("Location:..addProducts.php?msg=808");
			}
			else
			{
				if($file_name !='')
				{
					$target_file=$target_dir.basename($_FILES['file']['name']);
					$extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					$extension_arr=array("jpg","jpeg","png","gif");

					if (in_array($extension, $extension_arr)) {
						
						$image_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
						$image="data:image/".$extension."base64".$image_base64;

						if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
							
							$query="INSERT INTO products(type,price,status,file_name,image) VALUES('$type','$price','$status','$file_name','$image')";
							$result=mysqli_query($con,$query);

							if ($result) {
								
								header("Location:../addProducts.php?msg=404");
							}
							else
								header("Location:../addProducts.php?msg=506");
						}
					}
				}	
			}	
		}
 ?>