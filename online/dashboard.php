<?php
    require ('config.php');
    require ('session.php');
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
                    <li class="nav-header">
                        Hello Admin
                    </li>
                    
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
                                <a href=""><button class="btn btn-primary">Payment</button></a>
                            </div>
                            <h5>Payment Details List</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">
                         <div class="table-responsive">
                            <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Refcode</th>
                                    <th>Bank</th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Payee Acct Name</th>
                                    <th>Phone Number</th>
                                    <th>Unique Code</th>
                                    <th>Code Usage</th>
                                    <th>Image</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $getList = "SELECT * FROM payment_evidence";
                                    $result = mysqli_query($conn,$getList);
                                    $count = mysqli_num_rows($result);
                                    if($count > 0){
                                    while($row = $result->fetch_assoc()) {
                                ?>              
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['refcode']?></td>
                                    <td><?php echo $row['bank']?></td>
                                    <td><?php echo $row['payment_date']?></td>
                                    <td><?php echo $row['amount']?></td>
                                    <td><?php echo $row['payee_acct_name']?></td>
                                    <td><?php echo $row['phone_number']?></td>
                                    <td><?php echo $row['unique_code']?></td>
                                    <td><?php echo $row['code_use']?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?=$row['id'];?>">
                                            View Image
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal inmodal" id="myModal<?=$row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                            <div class="modal-body">
                                               <img src="uploads/<?=$row['screenshot'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php 
                        }
                        }else{
                            echo "Nothing to display";
                        } 

                    ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="12">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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

