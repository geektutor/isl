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


	<div class="col-lg-6 order-md-1">
		<center><h2>Confirm Payment</h2></center>
		<br>
		<form method="POST" action="confirm_payment_suc.php" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Student name</label>
	          	<div class="input-group">
					<input type="text" class="form-control" name="name" value="" required="">
	          	</div>
	        </div>
	        <div class="mb-3">
				<label>Screenshot of payment</label>
	          	<div class="input-group">
                    <input type="file" class="form-control" id="fileToUpload" name="myfile">
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
					<input type="date" class="form-control" name="date" max=<? echo date("Y-m-d")?> required="">
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
				<label>Email Address</label>
	          	<div class="input-group">
					<input type="email" class="form-control" name="email" required="">
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