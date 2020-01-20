<?php include ('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Payment</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-4.6.3.min.css">
	<link rel="stylesheet" type="text/css" href="form-validation.css">

	<style type="text/css">
    	label{
    		font-size: 20px;
    	}
    	.student input{
    		font-size: 20px;
    	}
    </style>
</head>
<body>

	<?php
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$pay = $_FILE['pay']['tmp_name'];
			$refcode = $_POST['refcode'];
			$bank = $_POST['bank'];
			$date = $_POST['date'];
			$amount = $_POST['amount'];
			$p_acct_name = $_POST['p_acct_name'];
			$number = $_POST['number'];
			$token = generateUniqueId();


			$sql = "INSERT INTO payment_evidence(name, screenshot, refcode, bank, payment_date, amount, payee_acct_name, phone_number, unique_code) VALUES('$name', '$pay', '$refcode', '$bank', '$date', '$amount', '$p_acct_name','$number', '$token')";
			if($conn->query($sql)){
                $message = "A unique pin will be sent to you in a moment";
            }else{
                die('could not enter data: '. $conn->error);
            }
		}
		function generateUniqueId(){	
			global $conn;
			// generate a 6 digit unique shortcode
			$token = substr(md5(uniqid(rand(), true)),0,6);
			//check if the shortcode has being assigned to another url...if yes....regenerate another unique code 
			$query = "SELECT * FROM payment_evidence WHERE unique_code = '".$token."' ";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
			if ($count > 0) {
				generateUniqueId();
			}else{
				return $token;
			}
		}

	?>


	<div class="col-lg-12 order-md-1">
		<center>
    		<h2 class="mb-3">Confirm Payment</h2>
	    	<h3>Fill in the form with appropriate information.</h3>
			<?php if($message !== ""){echo "<h3 style='color: green';>".$message."</h3>";} ?>
    	</center>
		<form method="POST">
			<div class="mb-3">
				<label>Student name</label>
	          	<div class="input-group">
					<input type="text" class="form-control" name="name" value="" required="">
	          	</div>
	        </div>
	        <div class="mb-3">
				<label>Screenshot of payment</label>
	          	<div class="input-group">
					<input type="file" class="form-control" name="pay" value="" required="">
	          	</div>
	        </div>
			<div class="mb-3">
				<label>Refcode</label>
		        <div class="input-group">
					<textarea class="form-control" name="refcode" required=""></textarea>
		        </div>
	        </div>
			<div class="mb-3">
				<label>Bank name</label>
	          	<div class="input-group">
					<input type="text" class="form-control" name="bank" required="">
	          	</div>
	        </div>
	        <div class="mb-3">
				<label>Payment Date</label>
	          	<div class="input-group">
					<input type="date" class="form-control" name="date" required="">
	          	</div>
	        </div>
	        <div class="mb-3">
				<label>Amount</label>
	          	<div class="input-group">
					<input type="number" class="form-control" name="amount" required="">
	          	</div>
	        </div>
	        <div class="mb-3">
				<label>Payee Acct name</label>
	          	<div class="input-group">
					<input type="text" class="form-control" name="p_acct_name" required="">
	          	</div>
	        </div>
			<div class="mb-3">
				<label>Phone Number</label>
	          	<div class="input-group">
					<input type="number" class="form-control" name="number" required="">
	          	</div>
	        </div>
			<center>
				<div class="student">
					<input type="submit" class="btn btn-primary" name="submit">
				</div>
			</center>
		</form>
	</div>
</body>
</html>