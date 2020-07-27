 <?php 

    include ('config.php');
 
  
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

   if (isset($_POST['submit'])) {
   $name = $_POST['name'];
    $refcode = $_POST['refcode'];
    $bank = $_POST['bank'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $p_acct_name = $_POST['p_acct_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $token = generateUniqueId();
    $fileName = $_FILES['myfile']['name'];
    // var_dump($fileName);

    $query = "SELECT * FROM payment_evidence WHERE refcode = '".$refcode."' ";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
    

    $sql = "INSERT INTO payment_evidence(name, screenshot, refcode, bank, payment_date, amount, payee_acct_name, email, phone_number, unique_code) VALUES('$name', '$fileName', '$refcode', '$bank', '$date', '$amount', '$p_acct_name', '$email','$number', '$token')";
    if($conn->query($sql)){
      if ($fileName !== "") {
        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";

        $errors = array(); // Store all foreseen and unforseen errors here

        $fileExtensions = array('jpeg','jpg','png'); // Get all the file extensions

        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName  = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];
        $tmp = explode('.', $fileName);
        $fileExtension = end($tmp);

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

        // if (isset($_POST['submit'])) {

            if (!in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }

            if ($fileSize > 2000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }

            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                if ($didUpload) {
                    $upload = "true";
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }
        //}

      }
      

            $message = "A unique pin will be sent to you in a moment";
        
    }else{
        die('could not enter data: '. $conn->error);
    }
    }else{
      $message = "Payment evidence already exist";
    }

  }
    
  ?>
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

  <div class="col-lg-12">
    <br>
    <center>
        <h2 class="mb-3">Confirm Payment</h2>
      <?php if($message !== ""){echo "<h3 style='color: green';>".$message."</h3>";} ?>
      </center>
    </div>
</body>
</html>
