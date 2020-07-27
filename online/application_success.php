<?php
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