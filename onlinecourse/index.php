<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $num = mysqli_fetch_array($query);
        $_SESSION['login'] = $regno;
        $_SESSION['id'] = $num['StudentRegno'];
        $_SESSION['sname'] = $num['studentName'];
        $_SESSION['pcode'] = "";

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;

        $log = mysqli_query($con, "INSERT INTO userlog(studentRegno,userip,loginTime,status) VALUES('$regno','$uip',NOW(),'$status')");
        if (!$log) {
            file_put_contents("login_error.txt", date('Y-m-d H:i:s') . " - Error: " . mysqli_error($con) . "\n", FILE_APPEND);
        }
        else {
            file_put_contents("login_success.txt", date('Y-m-d H:i:s') . " - Log ID: " . mysqli_insert_id($con) . " for " . $_SESSION['login'] . "\n", FILE_APPEND);
        }
        header("location:change-password.php");
        exit();
    }
    else {
        $_SESSION['errmsg'] = "Invalid Reg no or Password";
        header("location:index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body class="student-login-bg">
    <?php include('includes/header.php'); ?>

<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a href="index.php">Home </a></li>
                             <li><a href="admin/">Admin Login </a></li>
                              <li><a href="index.php">Student Login</a></li>
        

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="login-overlay">
        

    <div class="content-wrapper">
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6 login panel">
                 <?php if ($_SESSION['errmsg'] != "") { ?>
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
</div>
<?php
}?>
                     <label>Enter Reg no : </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>
                <div class="col-md-5 col-md-offset-1">

                    <div class="alert alert-info">
                
                         <strong> Latest News / Updates</strong>
                         <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
$sql = mysqli_query($con, "select * from news");
$cnt = 1;
while ($row = mysqli_fetch_array($sql)) 
{
?>
                            <li>
                              <a href="news-details.php?nid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['newstitle']); ?>-<?php echo htmlentities($row['postingDate']); ?></a>
                            </li>
                           <?php
}?> 
                     
                        </ul>
                    </marquee>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
