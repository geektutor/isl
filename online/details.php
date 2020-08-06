<?php
    require ('config.php');
    require ('session.php');

    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/table_foo_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 06:05:37 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ISL-ADMIN</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/application_form.css">

</head>

<body>

    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                 
               
                  
                </ul>   
                    
                   
                    
            </div>
        </nav>
    

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Admin Portal</span>
                </li>
                
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                       
                        <div class="ibox-title">
                            <div class="bottons">
                                <a href="applicationdashboard.php"><button class="btn btn-primary">Application</button></a>
                                <a href="dashboard.php"><button class="btn btn-primary">Payment</button></a>
                            </div>
                            <h5>Application Details</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <?php
                                    $getList = "SELECT * FROM student_details WHERE exam_no = '$id'";
                                    $result = mysqli_query($conn,$getList);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <div class="overall">
                                    <h2 class="title">INFORMATION OF CANDIDATE</h2>

                                    <h3 class="info">Name: <span class="ans"><?=$row['surname']?> <?=$row['first_name']?></span></h3>

                                    <h3 class="info">Age: <span class="ans"><?=$row['age']?></span></h3>

                                    <h3 class="info">Date of Birth: <span class="ans"><?=$row['dob']?></span></h3>

                                    <h3 class="info">Nationalty: <span class="ans"><?=$row['nationality']?></span></h3>
                                    <h3 class="info">Gender: <span class="ans"><?=$row['gender']?></span></h3>

                                    <h3 class="info">Present School: <span class="ans"><?=$row['present_school']?></span></h3>

                                    <h3 class="info">Last Class: <span class="ans"><?=$row['last_class']?></span></h3>
                                    <h3 class="info">Present Class: <span class="ans"><?=$row['present_class']?></span></h3>
                                    <h3 class="info">Next Class: <span class="ans"><?=$row['next_class']?></span></h3>
                                    <h3 class="info">Address: <span class="ans"><?=$row['address']?></span></h3>
                                    <h3 class="info">Postal Address: <span class="ans"><?=$row['postal_address']?></span></h3>
                                    <h3 class="info">Who will Pay: <span class="ans"><?=$row['who_will_pay']?></span></h3>
                                    <h3 class="info">Relationship: <span class="ans"><?=$row['relationship']?></span></h3>
                                    <h3 class="info">Full address of who will Pay: <span class="ans"><?=$row['full_address']?></span></h3>
                                    <h3 class="sub">Child's Passport</h3>
                                    <img class="yfe" src="uploads/<?=$row['passport'];?>" alt="">
                                    
                                    <h2 class="title">INFORMATION OF BIOLOGICAL PARENTS</h2>

                                    <h3 class="info">Father's Name: <span class="ans"><?=$row['father_name']?></span></h3>
                                    <h3 class="info">Father's Address: <span class="ans"><?=$row['father_address']?></span></h3>
                                    <h3 class="info">Father's Phone Number: <span class="ans"><?=$row['father_phone']?></span></h3>
                                    <h3 class="info">Father's Workplace: <span class="ans"><?=$row['father_workplace']?></span></h3>

                                    <h3 class="info">Mother's Name: <span class="ans"><?=$row['mother_name']?></span></h3>
                                    <h3 class="info">Mother's Address: <span class="ans"><?=$row['mother_address']?></span></h3>
                                    <h3 class="info">Mother's Phone Number: <span class="ans"><?=$row['mother_phone']?></span></h3>
                                    <h3 class="info">Mother's Workplace: <span class="ans"><?=$row['mother_workplace']?></span></h3>

                                    <h2 class="title">INFORMATION OF PARENTS THAT ARE STAFF</h2>

                                    <h3 class="info">Relationship:
                                        <span class="ans">
                                        <?php if($row['staff_father'] == ''){ 
                                            echo "Mother";
                                        }else{ 
                                            echo "Father";
                                        }
                                        ?>
                                       
                                        </span></h3>
                                    <h3 class="info">Name: 
                                        <span class="ans">
                                         <?php if($row['staff_father'] == ''){ 
                                            echo $row['staff_mother'];
                                        }else{ 
                                            echo $row['staff_father'];
                                        }
                                        ?>
                                        </span>
                                    </h3>
                                    <h3 class="info">Staff Number: 
                                        <span class="ans">

                                        <?php if($row['staff_father_no'] == ''){ 
                                            echo $row['staff_mother_no'];
                                        }else{ 
                                            echo $row['staff_father_no'];
                                        }
                                        ?>
                                        </span></h3>
                                    <h3 class="info">Faculty: 
                                        <span class="ans">
                                        <?php if($row['staff_father_fac'] == ''){ 
                                            echo $row['staff_mother_fac'];
                                        }else{ 
                                            echo $row['staff_father_fac'];
                                        }
                                        ?>
                                        </span>
                                    </h3>
                                    <h3 class="info">Department: 
                                        <span class="ans">
                                        <?php if($row['staff_father_dept'] == ''){ 
                                            echo $row['staff_mother_dept'];
                                        }else{ 
                                            echo $row['staff_father_dept'];
                                        }
                                        ?>
                                        </span>
                                    </h3>
                                    <h3 class="info">Office/Room Number: 
                                        <span class="ans">
                                        <?php if($row['staff_father_offNum'] == ''){ 
                                            echo $row['staff_mother_offNum'];
                                        }else{ 
                                            echo $row['staff_father_offNum'];
                                        }
                                        ?>
                                        </span>
                                    </h3>


                                    <h2 class="title">INFORMATION OF GUARDIAN(IF ANY)</h2>

                                    <h3 class="info">Guardian Name: <span class="ans"><?=$row['guardian']?></span></h3>
                                    <h3 class="info">Address: <span class="ans"><?=$row['guardian_address']?></span></h3>
                                    <h3 class="info">Phone Number: <span class="ans"><?=$row['guardian_phone']?></span></h3>
                                    <h3 class="info">Workplace: <span class="ans"><?=$row['guardian_workplace']?></span></h3>
                                    <h3 class="info">Relationship with Guardian: <span class="ans"><?=$row['relationship_with_g']?></span></h3>

                                    

                                    <h2 class="title">ATTESTATION BY PARENT</h2>

                                    <h3 class="info">Name: <span class="ans"><?=$row['attestation_name']?></span></h3>
                                    <h3 class="info">Date: <span class="ans"><?=$row['attestation_date']?></span></h3>
                                    <?php }} ?>
         

                                </div>
                            </div>
                        </div>
             
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/table_foo_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 May 2018 06:05:37 GMT -->
</html>

