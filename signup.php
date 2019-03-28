<?php include("functions/functions.php"); 
		?>
<?php
	if(isset($_POST['register'])){
		$ip=getIp();
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_pass=$_POST['c_pass'];
		$c_no=$_POST['c_no'];
		$c_name=$_POST['c_name'];

		$insert_c="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_contact) values('$ip','$c_name','$c_email','$c_pass','$c_no')";

		$run_c = mysqli_query($con, $insert_c);

		if($run_c){
			echo "<script>alert('Registration Successfull')</script>";
		}
	
	}
 ?>