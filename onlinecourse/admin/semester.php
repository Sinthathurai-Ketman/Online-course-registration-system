<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// COde for insertion
if(isset($_POST['submit']))
{
    $semester = mysqli_real_escape_string($con, $_POST['semester']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // ✅ Date validation
    if($end_date <= $start_date)
    {
        echo '<script>alert("End Date must be greater than Start Date!")</script>';
    }
    else
    {
        $ret = mysqli_query($con, 
        "INSERT INTO course_duration(semester, start_date, end_date) 
         VALUES('$semester', '$start_date', '$end_date')");

        if($ret)
        {
            echo '<script>alert("Created Successfully !!")</script>';
            echo '<script>window.location.href="semester.php"</script>';
        }
        else
        {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
    }
}

//Code For Deletion
if(isset($_GET['del']) && $_GET['del']=="delete")
{
    $sid = intval($_GET['id']); // safer

    mysqli_query($con,"DELETE FROM course_duration WHERE id=$sid");

    echo '<script>alert("Deleted Successfully !!")</script>';
    echo '<script>window.location.href="semester.php"</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Course Duration</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course Duration </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Duration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="semester" method="post" action="semester.php">

   <div class="form-group">
    <label for="semester">Add Course Duration  </label>
    <input type="text" class="form-control" id="semester" name="semester" placeholder=" " required />
  </div>

  <div class="form-group">
  <label>Start Date</label>
  <input type="date" class="form-control" name="start_date" required />
</div>

<div class="form-group">
  <label>End Date</label>
  <input type="date" class="form-control" name="end_date" required />
</div>

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Duration
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Duration</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from course_duration");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['semester']); ?></td>
<td><?php echo htmlentities($row['start_date']); ?></td>
<td><?php echo htmlentities($row['end_date']); ?></td>

                                            
                                            <td>
  <a href="semester.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
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
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
