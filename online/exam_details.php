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
		          	<?php if($msg !==""){echo "<h2 style='color: red;'>". $msg. "</h2>";} ?>
					<label>Enter your Exam number</label>
					<input type="text" class="form-control" name="exam_no" required="" minlength="4" maxlength="4">
		          </div>
		        </div>
				<div class="student">
					<input type="submit" class="btn btn-large btn-primary" name="submit">
				</div>
		</form>
		</div>
	</main>

</body>
</html>