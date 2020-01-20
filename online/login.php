<?php include ('config.php'); 
?>
<?php
    session_start();
        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $myPassword = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM admin WHERE user = '$username' AND password = '$myPassword'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['login_user'] = $username;
                header("location: dashboard.php");
            }else {
                $error = "Your Login Name or Password is invalid";
            }
        }   
        


    ?>
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 06:03:41 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ISL-ADMIN LOGIN</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <div class="ibox-content">
                    <h3>Enter Login Details</h3>
                    <form class="m-t" role="form" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Login</button>
                    </form>
                </div>
            </div>
            
    </div>
</div>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 06:03:41 GMT -->
</html>
