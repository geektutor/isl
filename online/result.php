<?php include ('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ISL-Home</title>
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
    		font-size: 26px;
    	}
    	.student input{
    		font-size: 20px;
    	}
    </style>
</head>
<body>
	<br>

<center><h3>ISL 2020 ADMISSION</h3></center>

<?php
	if (isset($_POST['submit'])) {

		$exam_no = $_POST['exam_no'];
		$sql = "SELECT * FROM exam_venue WHERE uid = '$exam_no'";
		$result = mysqli_query($conn,$sql);
        // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count > 0) { 
        	while($row = $result->fetch_assoc()) {
        ?>
		<div class="col-lg-12 order-md-1">
        <div class="row">
		    <div class="col-md-6 mb-3">
				<h4>Your Exam venue is: International School, University of lagos Campus, Akoka-Yaba, Lagos</h4>
				<h4>Class = <?php echo $row['class']; ?> </h4>
				<h4>Exam number: <?php echo $row['uid']; ?></h4>
			</div>
        </div>
        </div>	
		<?php }}else{
			$msg = "Wrong Exam number";
		}
	}
?>
	<main>
		<br>
		<br>
		<div class="col-lg-12 order-md-1">
			<form method="POST">
				<div class="row">
		          <div class="col-md-6 mb-3">
		          	<?php if(isset($msg)){echo "<h2 style='color: red;'>". $msg. "</h2>";} ?>
					<label>Enter your Exam number</label>
					<input type="text" class="form-control" name="exam_no" required="" minlength="4" maxlength="4">
		          </div>
		        </div>
				<div class="student">
					<input type="submit" class="btn btn-large btn-primary" name="submit">
				</div>
		</form>
		<div>
			<br>
			<h3>Click here <a href="mailto:segunshodunke@unilagconsult.com.ng">to report a problem</a></h3>
		</div>
		</div>
		<br>
		<br>
		IMPORTANT INFORMATION FOR SUCCESSFUL CANDIDATES

All candidates who scored 40% and above, are successful and are, therefore, offered provisional admission. They are to note the following:

They would be issued with Admission letters between Thursday, 10th and Friday, 18th September 2020, between 10.00am and 3.00pm daily.

1.	Bring original copy of hospital birth certificate as indicated below:
	(Serial No. 1-145) To see Vice-Principal (Administration) 1st Floor
(Serial No. 146 - 290) To see Vice-Principal (Academics) 1st Floor
(Serial No. 291 - 436) To see Mrs. O.A. Adebayo (Ground Floor, 2nd room on the right)

Parents who are members of staff of the University of Lagos are to collect ‘Staff Child’s Status Form’ from the Officers above, and take the same to the Human Resources Department, Senate Building for necessary endorsement.

2.	The original copy of the birth certificate will be checked and if confirmed okay, you would be issued with a Remita slip for the payment of ₦10,000 non-refundable Acceptance fee, at any bank.

3.	After the payment of ₦10,000 non-refundable Acceptance fee, candidate should present the bank payment teller together with the Remita receipt obtained from the Bank at the Accounts office (Ground Floor) where you would be issued with a receipt, accordingly.

4.	Take the receipt to the office of the Vice-Principal (Administration) where you would further be attended to.

5.	Pay the requisite school fees on or before Friday, 2nd October, 2020.

	</main>

</body>
</html>
