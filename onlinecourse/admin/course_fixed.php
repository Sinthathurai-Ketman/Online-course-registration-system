<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
}
else {
    // Code for Insertion
    if (isset($_POST['submit'])) {
        $department = $_POST['department'];
        $coursecode = $_POST['coursecode'];
        $coursename = $_POST['coursename'];
        $seatlimit = $_POST['seatlimit'];

        // Check if courseCode already exists
        $check = mysqli_query($con, "select * from course where courseCode='$coursecode'");
        if (mysqli_num_rows($check) > 0) {
            $_SESSION['msg'] = "Error : Course Code already exists!!";
        }
        else {
            $ret = mysqli_query($con, "insert into course(courseCode,departmentId,courseName,noofSeats) values('$coursecode','$department','$coursename','$seatlimit')");
            if ($ret) {
                $_SESSION['msg'] = "Course Created Successfully !!";
            }
            else {
                $_SESSION['msg'] = "Error : Course not created!!";
            }
        }
        header('location:course_fixed.php');
        exit();
    }

    // Code for Deletion
    if (isset($_GET['del'])) {
        // Now using courseCode for deletion
        mysqli_query($con, "delete from course where courseCode = '" . $_GET['id'] . "'");
        $_SESSION['delmsg'] = "Course deleted!!";
        header('location:course_fixed.php');
        exit();
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin | Course</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php'); ?>
    <!-- LOGO HEADER END-->
<?php if ($_SESSION['alogin'] != "") {
        include('includes/menubar.php');
    }
?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>


                        <div class="panel-body">
                       <form name="dept" method="post" action="course_fixed.php">
   
   <div class="form-group">
    <label for="department">Department</label>
    <select class="form-control" name="department" required>
        <option value="">Select Department</option>
        <?php
    $sql = mysqli_query($con, "select * from department");
    while ($row = mysqli_fetch_array($sql)) {
        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['department']) . '</option>';
    }
?>
    </select>
  </div>

   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" required />
  </div>

 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
  </div>

<div class="form-group">
    <label for="seatlimit">Seat limit  </label>
    <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat limit" required />
  </div>   

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Department</th>
                                            <th>Course Name </th>
                                            <th>Seat limit</th>
                                             <th>Creation Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
    // Join with department table to get department name
    $sql = mysqli_query($con, "select course.*, department.department as deptName from course left join department on course.departmentId=department.id order by course.creationDate asc");
    $cnt = 1;
    while ($row = mysqli_fetch_array($sql)) {
?>


                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo htmlentities($row['courseCode']); ?></td>
                                            <td><?php echo htmlentities($row['deptName']); ?></td>
                                            <td><?php echo htmlentities($row['courseName']); ?></td>
                                             <td><?php echo htmlentities($row['noofSeats']); ?></td>
                                            <td><?php echo htmlentities($row['creationDate']); ?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo urlencode($row['courseCode']); ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>                                        
  <a href="course_fixed.php?id=<?php echo urlencode($row['courseCode']); ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php
        $cnt++;
    }
?>

                                        
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
}
?>
