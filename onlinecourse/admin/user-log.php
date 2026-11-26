<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    
header('location:index.php');
}
else {



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Logs</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <style>
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .table thead {
            background-color: #6d0215ff;
            color: white;
        }
        .table thead th {
            border: none !important;
            padding: 15px !important;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }
        .table tbody tr:hover {
            background-color: #fff1f3;
            transition: background-color 0.3s ease;
        }
        .table td {
            padding: 12px 15px !important;
            vertical-align: middle !important;
            border-bottom: 1px solid #f2f2f2;
        }
        .page-head-line {
            border-bottom: 2px solid #f8244a;
            padding-bottom: 15px;
            margin-bottom: 30px;
            color: #333;
            font-weight: 600;
        }
    </style>
</head>

<body>
<?php include('includes/header.php'); ?>
    <!-- LOGO HEADER END-->
<?php if ($_SESSION['alogin'] != "") 
{
        include('includes/menubar.php');    }
?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student Logs  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Login History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                
                                                    <th>Student Reg no </th>
                                            <th>IP  </th>
                                            <th>Login Time </th>
                                            
                                                <th>Logout Time</th>
                                             <th>Status</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
<?php    $sql = mysqli_query($con, "select * from userlog order by id asc");    $cnt = 1;    while ($row = mysqli_fetch_array($sql)) 
{
?>


                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                              <td><?php echo htmlentities($row['studentRegno']); ?></td>
                                            <td><?php echo htmlentities($row['userip']); ?></td>
                                            <td><?php echo htmlentities($row['loginTime']); ?></td>
                                            <td><?php echo htmlentities($row['logout']); ?></td>
                                            <td><?php echo htmlentities($row['status']); ?></td>
                                        </tr>
<?php
        
$cnt++;    }?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
<?php
}?>
