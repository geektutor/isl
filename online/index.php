<?php 
	include ('config.php'); 
	if (isset($_POST['submit'])) {

		$unique_id = $_POST['unique'];
		$sql = "SELECT * FROM payment_evidence WHERE unique_code = '$unique_id' AND code_use = 'unused'";
		$result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
        	header("location:application_form.php?a=$unique_id");
		}else{
			echo "<br><center><h3 style='color:red;'>Pin is used</h3></center>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ISL-Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
    	label{
    		font-size: 26px;
    	}
    	.student input{
    		font-size: 20px;
    	}
    </style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-4.6.3.min.css">
	<link rel="stylesheet" type="text/css" href="form-validation.css">
</head>
<body>
	<br>
	<br>
<center><h3>ISL 2020 ADMISSIONS</h3></center>

<?php
	
?>
	<main>
		<br>
		<br>
		<div class="col-lg-12 order-md-1">
			<form method="POST">
				<div class="row">
		          <div class="col-md-6 mb-3">
					<label>Enter your unique code</label>
					<input type="text" class="form-control" name="unique" required="">
		          </div>
		        </div>
				<div class="student">
					<input type="submit" class="btn btn-large btn-primary" name="submit">
				</div>
		</form>
		<div>
			<br>
			<br>
			<h3>Click here <a href="confirm_payment.php">Confirm Payment</a> to get unique code</h3>
			<h3>Click here <a href="exam_details.php">Exam details</a> to check your exam venue and other details</h3>

		</div>
		</div>
	</main>
</body>
</html>