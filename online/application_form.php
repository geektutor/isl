<?php 
	include ('config.php'); 
	$uqname = $_GET['a'];

	function keys(){	
		global $conn;
		// generate a 6 digit unique shortcode
		$tokens = substr(md5(uniqid(rand(), true)),0,6);
		//check if the shortcode has being assigned to another url...if yes....regenerate another unique code 
		$query = "SELECT * FROM student_details WHERE keys = '".$tokens."' ";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			keys();
		}else{
			return $tokens;
		}
	}
	if (isset($_POST['submit'])) {
		$surname = $_POST['surname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$dob = $_POST['dob'];
		$nationality = $_POST['nationality'];
		$gender = $_POST['gender'];
		$present_school = $_POST['present_school'];
		$last_class = $_POST['last_class'];
		$present_class = $_POST['present_class'];
		$next_class = $_POST['next_class'];
		$address = $_POST['address'];
		$postal_address = $_POST['postal_address'];
		$who_will_pay = $_POST['who_will_pay'];
		$relationship = $_POST['relationship'];
		$full_address = $_POST['full_address'];
		$father_name = $_POST['father_name'];
		$father_address = $_POST['father_address'];
		$father_phone = $_POST['father_phone'];
		$father_workplace = $_POST['father_workplace'];
		$mother_name = $_POST['mother_name'];
		$mother_address = $_POST['mother_address'];
		$mother_phone = $_POST['mother_phone'];
		$mother_workplace = $_POST['mother_workplace'];
		$staff_father = $_POST['staff_father'];
		$staff_father_no = $_POST['staff_father_no'];
		$staff_father_fac = $_POST['staff_father_fac'];
		$staff_father_dept = $_POST['staff_father_dept'];
		$staff_father_offNum = $_POST['staff_father_offNum'];
		$staff_mother = $_POST['staff_mother'];
		$staff_mother_no = $_POST['staff_mother_no'];
		$staff_mother_fac = $_POST['staff_mother_fac'];
		$staff_mother_dept = $_POST['staff_mother_dept'];
		$staff_mother_offNum = $_POST['staff_mother_offNum'];
		$guardian = $_POST['guardian'];
		$guardian_address = $_POST['guardian_address'];
		$guardian_email = $_POST['guardian_email'];
		$guardian_phone = $_POST['guardian_phone'];
		$guardian_workplace = $_POST['guardian_workplace'];
		$relationship_with_g = $_POST['relationship_with_g'];
		$attestation_name = $_POST['attestation_name'];
		$attestation_date = $_POST['attestation_date'];
		$code = $_POST['unique'];
		$rkeys  = keys();

		$sql = "INSERT INTO student_details(surname, first_name, age, dob, nationality, gender, present_school, last_class, present_class, next_class, address, postal_address, who_will_pay, relationship, full_address, father_name, father_address, father_phone, father_workplace, mother_name, mother_address, mother_phone, mother_workplace, staff_father, staff_father_no, staff_father_fac, staff_father_dept, staff_father_offNum, staff_mother, staff_mother_no, staff_mother_fac, staff_mother_dept, staff_mother_offNum, guardian, guardian_address, guardian_email, guardian_phone, guardian_workplace, relationship_with_g, attestation_name, attestation_date, rkeys) VALUES('$surname', '$firstname', '$age', '$dob', '$nationality', '$gender', '$present_school', '$last_class', '$present_class', '$next_class', '$address', '$postal_address', '$who_will_pay', '$relationship', '$full_address', '$father_name', '$father_address', '$father_phone', '$father_workplace', '$mother_name', '$mother_address', '$mother_phone', '$mother_workplace', '$staff_father', '$staff_father_no', '$staff_father_fac', '$staff_father_dept', '$staff_father_offNum', '$staff_mother', '$staff_mother_no', '$staff_mother_fac', '$staff_mother_dept', '$staff_mother_offNum', '$guardian', '$guardian_address', '$guardian_email', '$guardian_phone', '$guardian_workplace', '$relationship_with_g', '$attestation_name', '$attestation_date', '$rkeys')";

		if($conn->query($sql)){
	 		$q = "UPDATE payment_evidence SET code_use = 'used' WHERE unique_code = '$code'";
	 		if($conn->query($q)){
                header("location:success.php?kdb=$rkeys");
	 		}else{
	 			die('could not enter data: '. $conn->error);
	 		}

        }else{
            die('could not enter data: '. $conn->error);
        }
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>APPLICATION FORM</title>
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
    		font-size: 18px;
    	}
    	.student input{
    		font-size: 20px;
    	}
    </style>
</head>
<body>
	
	<main>
		<div class="col-lg-6 order-md-1">
    	<center>
    		<h2 class="mb-3">APPLICATION FORM</h2>
	    	<h3>Fill in the form with appropriate information</h3>
    	</center>
		<form class="needs-validation" method="POST">
			<div class="mb-3">
	          <label for="">Unique Code</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="unique" value="<?php echo $uqname;?>" readonly required>
				<div class="invalid-feedback">
                  This field is required.
                </div>
	          </div>
	        </div>
	        <hr>
	        <h4>SECTION A: INFORMATION OF CANDIDATE</h4>
			<div class="row">
	          <div class="col-md-6 mb-3">
	            <label for="firstName">Surname</label>
				<input type="text" class="form-control" name="surname" placeholder="surname" value="" required="">
	          </div>
	          <div class="col-md-6 mb-3">
	            <label for="lastName">First Name</label>
				<input type="text" class="form-control" name="firstname" placeholder="firstname" value="" required="">
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="Age">Age</label>
				<input type="number" class="form-control" name="age" placeholder="age" value="" required="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="Age">Date of Birth</label>
	            <input type="date" class="form-control" name="dob" class="form-control" id="pNumber" placeholder="pNumber" required>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="Age">Nationality</label>
				<input type="text" class="form-control" name="nationality" placeholder="nationality" value="" required="">
	          </div>
	          <div class="col-md-6 mb-3">
				<label>Gender</label>
				<select name="gender" class="custom-select d-block w-100" required="">
					<option>Choose gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
	          </div>
	        </div>

	        <div class="mb-3">
	          <label for="">Present School</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="present_school" placeholder="present_school" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Last Class</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="last_class" placeholder="last_class" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Present Class</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="present_class" placeholder="present_class" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Next Class</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="next_class" placeholder="next_class" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Address</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="address" placeholder="address" value="" required="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Postal Address</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="postal_address" placeholder="postal_address" value="">
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="">Who Will Pay</label>
				<input type="text" class="form-control" name="who_will_pay" placeholder="who_will_pay" value="" required="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="">Relationship</label>
				<input type="text" class="form-control" name="relationship" placeholder="relationship" value="" required="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Full Address Of Who Will Pay</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="full_address" placeholder="full_address" value="" required="">
	          </div>
	        </div>

	        <hr>
	        <h4>SECTION B: INFORMATION OF BIOLOGICAL PARENTS</h4>
			<div class="mb-3">
	          <label for="">Father's Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="father_name" placeholder="father_name" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Father's Address</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="father_address" placeholder="father_address" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Father's Phone Number</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="father_phone" placeholder="father_phone" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Father's Workplace</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="father_workplace" placeholder="father_workplace" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Mother's Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="mother_name" placeholder="mother_name" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Mother's Address</label>
	          <div class="input-group">
				<input type="text" class="form-control" class="form-control" name="mother_address" placeholder="mother_address" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Mother's Phone number</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="mother_phone" placeholder="mother_phone" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Mother's Workplace</label>
	          <div class="input-group">
				<input type="text" class="form-control" class="form-control" name="mother_workplace" placeholder="mother_workplace" value="">
	          </div>
	        </div>

	        <hr>
	        <h4>Fill this part if Father is a member of staff in University of Lagos</h4>
	        <div class="mb-3">
	          <label for="">Father's Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="staff_father" placeholder="staff_father" value="">
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-6 mb-3">
	            <label>Staff Number</label>
				<input type="text" class="form-control" name="staff_father_no" placeholder="staff_father_no" value="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="">Faculty</label>
				<input type="text" class="form-control" name="staff_father_fac" placeholder="staff_father_fac" value="">
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="">Department</label>
				<input type="text" class="form-control" name="staff_father_dept" placeholder="staff_father_dept" value="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="">Office/Room Number</label>
				<input type="text" class="form-control" name="staff_father_offNum" placeholder="staff_father_offNum" value="">
	          </div>
	        </div>
	       
	        <hr>
	        <h4>Fill this part if Mother is a member of staff in University of Lagos</h4>
	        <div class="mb-3">
	          <label for="">Mother's Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="staff_mother" placeholder="staff_mother" value="">
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="">Staff Number</label>
				<input type="text" class="form-control" name="staff_mother_no" placeholder="staff_mother_no" value="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="">Faculty</label>
				<input type="text" class="form-control" name="staff_mother_fac" placeholder="staff_mother_fac" value="">
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-6 mb-3">
	          	<label for="">Department</label>
				<input type="text" class="form-control" name="staff_mother_dept" placeholder="staff_mother_dept" value="">
	          </div>
	          <div class="col-md-6 mb-3">
	          	<label for="">Office/Room Number</label>
				<input type="text" class="form-control" name="staff_mother_offNum" placeholder="staff_mother_offNum" value="">
	          </div>
	        </div>
	        <hr>
	        <h4>SECTION C: INFORMATION OF GUARDIAN(IF ANY)</h4>
			<div class="mb-3">
	          <label for="">Guardian Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="guardian" placeholder="guardian" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Address</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="guardian_address" placeholder="guardian_address" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Email</label>
	          <div class="input-group">
				<input type="email" class="form-control" class="form-control" name="guardian_email" placeholder="guardian_email" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Phone Number</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="guardian_phone" placeholder="guardian_phone" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Workplace</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="guardian_workplace" placeholder="guardian_workplace" value="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Relationship With The Guardian</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="relationship_with_g" placeholder="relationship_with_g" value="">
	          </div>
	        </div>

	        <hr>
	        <h4>ATTESTATION BY PARENT: I certify that the above information is correct</h4>
	        <div class="mb-3">
	          <label for="">Name</label>
	          <div class="input-group">
				<input type="text" class="form-control" name="attestation_name" placeholder="attestation_name" value="" required="">
	          </div>
	        </div>
	        <div class="mb-3">
	          <label for="">Date</label>
	          <div class="input-group">
				<input type="date" class="form-control" name="attestation_date" placeholder="attestation_date" value="" required="">
	          </div>
	        </div>
			<center>
				<div class="student">
					<input type="submit" class="btn btn-primary" name="submit">
				</div>
			</center>

		</form>
	</div>
</main>


<hr>


</body>
</html>