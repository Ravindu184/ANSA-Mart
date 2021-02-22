<?php
		require('fpdf182/fpdf.php');
		require_once('../DBConnection.php');

		$date=date("d/m/yy");
		$ship_id=$_GET['ship_id'];
		$address="";
		$name="";
		$email="";
		$contact;
		$pro_type="";
		$pro_price="";
		$ship_rate;
		$quantity=0;
		$u_id=0;

		$query="SELECT *FROM ship WHERE id=$ship_id";
		$result=mysqli_query($con,$query);

		if ($result) {
			
			$data=mysqli_fetch_assoc($result);
			$address=$data['address'];
			$cart_id=$data['cart_id'];

			$query2="SELECT *FROM payment WHERE card_id=$cart_id";
			$result2=mysqli_query($con,$query2);

			if ($result2) {
				
				$data2=mysqli_fetch_assoc($result2);
				$name=$data2['name'];
				$email=$data2['email'];
				$contact=$data2['contact_no'];
				$ship_rate=$data2['shipping_rate'];

				$query3="SELECT *FROM cart WHERE id=$cart_id";
				$result3=mysqli_query($con,$query3);

				if ($result3) {
					
					$data3=mysqli_fetch_assoc($result3);

					$pro_type=$data3['product_type'];
					$pro_price=$data3['product_price'];
					$quantity=$data3['quantity'];
					$u_id=$data3['user_id'];
				}
			}
		}




		//pdf....
		$pdf= new FPDF('P','mm','A4');

		$pdf->AddPage();

		//Change font type and size
		$pdf->SetFont('Arial','B',14);

		//Those to are heading
		$pdf->Cell(130,5,'ANSA-Mart.com',0,0);
		$pdf->Cell(59,5,'INVOICE',0,1);

		//Again change font size to write content
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(130,5,'AM fabrication(pvt) Ltd,288/,',0,0);
		$pdf->Cell(59,5,'',0,1);
		$pdf->Cell(130,5,'8x.royalgarden,Rajagiriya.',0,0);

		$pdf->Cell(25,5,'Date',0,0);
		$pdf->Cell(34,5,$date,0,1);
		
		$pdf->Cell(130,5,'Phone +94765792187',0,0);
		$pdf->Cell(25,5,'Invoice #',0,0);
		$pdf->Cell(34,5,'[INVCUS'.$ship_id.']',0,1);

		$pdf->Cell(130,5,'Sanjaya700018@gmail.com',0,0);
		$pdf->Cell(25,5,'Customer ID',0,0);
		$pdf->Cell(34,5,'[ANSCUS'.$u_id.']',0,1);

		//creating table
		$pdf->Cell(189,10,'',0,1);

		//Billing address
		$pdf->Cell(100,5,'Bill to',0,1);

		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(90,5,$name,0,1);

		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(90,5,$email,0,1);

		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(90,5,$address,0,1);

		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(90,5,$contact,0,1);

		//Column virtical
		$pdf->Cell(189,10,'',0	,1);

		//Invoice Content
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(130,5,'Description',1,0);
		$pdf->Cell(25,5,'Tax',1,0);
		$pdf->Cell(34,5,'Amount',1,1);

		$pdf->SetFont('Arial','',12);
		$pdf->Cell(130,5,$pro_type,1,0);
		$pdf->Cell(25,5,'-',1,0);
		$pdf->Cell(34,5,$pro_price,1,1,'R');

		//Summery
		$pdf->Cell(130,5,'Subtotal(With Quantity)  x'.$quantity,1,0);
		$pdf->Cell(25,5,'',1,0);
		$pdf->Cell(9,5,'Rs.',1,0);
		$pdf->Cell(25,5,$pro_price * $quantity,1,1,'R');

		$pdf->Cell(130,5,'Shipping Cost',1,0);
		$pdf->Cell(25,5,'',1,0);
		$pdf->Cell(9,5,'Rs.',1,0);
		$pdf->Cell(25,5,$ship_rate,1,1,'R');

		$pdf->Cell(130,5,'Total',1,0);
		$pdf->Cell(25,5,'',1,0);
		$pdf->Cell(9,5,'Rs.',1,0);
		$pdf->Cell(25,5,$pro_price * $quantity + $ship_rate,1,1,'R');

		//other details
		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(35,5,'Bank',0,0);
		$pdf->Cell(30,5,'[*****]',0,0);
		$pdf->Cell(90,5,'',0,0);
		$pdf->Cell(50,5,'',0,1,'R');

		$pdf->Cell(35,5,'Account No',0,0);
		$pdf->Cell(70,5,'[*****]',0,0);
		$pdf->Cell(50,5,'',0,0);
		$pdf->Cell(50,5,'',0,1,'R');

		$pdf->Cell(35,5,'Account Name',0,0);
		$pdf->Cell(70,5,'[*****]',0,0);
		$pdf->Cell(50,5,'',0,0);
		$pdf->Cell(50,5,'',0,1,'R');

		$pdf->Cell(35,5,'Branch',0,0);
		$pdf->Cell(70,5,'[*****]',0,0);
		$pdf->Cell(50,5,'',0,0);
		$pdf->Cell(50,5,'',0,1,'R');

		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(170,5,'Please make the payment and Send a Screenshot or photograph of the receipt to,',0,0);
		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(10,5,'',0,0);
		
		$pdf->Cell(189,7,'',0,1);

		$pdf->Cell(170,5,'+071 0000 000 (WhatsApp),',0,0);
		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(10,5,'',0,0);

		$pdf->Cell(189,7,'',0,1);

		$pdf->Cell(170,5,'After payed your payment we will ship Your Order.',0,0);
		$pdf->Cell(10,5,'',0,0);
		$pdf->Cell(10,5,'',0,0);

		$pdf->Output(); 
 ?>