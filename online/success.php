<?php
// 	session_start();
	include ('config.php');
	$rkey =  $_GET['kdb'];
// 	$rkey =  $_SESSION['kdb'];
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
	<center><h2>Registration complete</h2></center>
	<?php
		$sql = "SELECT * FROM student_details WHERE rkeys = '$rkey'";

		$result = mysqli_query($conn,$sql);
        // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count > 0) {
        	while($row = $result->fetch_assoc()) {
    ?>
    <br><br>
	<center>
		<h2>Your Exam Number is <b> <?php echo $row['exam_no']; ?></b></h2>
		<p>(copy your exam number)</p>	
	</center>
	

    <?php
    }    	
		}else{
            die('could not enter data: '. $conn->error);
		}

	?>
	<div>
		<br>
		<br>
		<center><h3>Click <a href="exam_details.php">here</a> to check your exam venue</h3></center>
	</div>
</body>
</html>