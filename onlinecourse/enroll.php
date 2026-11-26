<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
}
elseif (strlen($_SESSION['pcode']) == 0) {
  header('location:pincode-verification.php');
}
else {
  if (isset($_POST['submit'])) {
    $studentregno = $_POST['studentregno'];
    $pincode = $_POST['Pincode'];
    $session = $_POST['session'];
    $dept = $_POST['department'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
    $photo = $_FILES["photo"]["name"];

    if ($photo != "") {
      move_uploaded_file($_FILES["photo"]["tmp_name"], "studentphoto/" . $_FILES["photo"]["name"]);
      mysqli_query($con, "update students set studentPhoto='$photo' where StudentRegno='$studentregno'");
    }

    // Inserting NULL for level since it's being removed
    $ret = mysqli_query($con, "insert into courseenrolls(studentRegno,pincode,session,department,course,semester) values('$studentregno','$pincode','$session','$dept','$course','$sem')");
    if ($ret) {
      echo '<script>alert("Enroll Successfully !!")</script>';
      echo '<script>window.location.href="enroll.php"</script>';
    }
    else {
      echo '<script>alert("Error : Not Enroll")</script>';
      echo '<script>window.location.href="enroll.php"</script>';
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
    <title>Course Enroll</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php'); ?>
    <!-- LOGO HEADER END-->
<?php if ($_SESSION['login'] != "") {
    include('includes/menubar.php');
  }
?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>
<?php
  $sql = mysqli_query($con, "select * from students where StudentRegno='" . $_SESSION['login'] . "'");
  while ($row = mysqli_fetch_array($sql)) {
?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']); ?>"  />
  </div>

  <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']); ?>"  placeholder="Student Reg no" readonly />
  </div>

<div class="form-group">
    <label for="Pincode">Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']); ?>" required />
  </div>   

<div class="form-group">
    <label>Student Photo</label><br>

<?php if ($row['studentPhoto'] == "") { ?>

    <img src="studentphoto/noimage.png" width="200" height="200"><br><br>
    
    <!-- Required upload if no image -->
    <label>Upload Student Photo *</label>
    <input type="file" class="form-control" name="photo" required>

<?php
    }
    else { ?>

    <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200"><br><br>
    
    <!-- Optional upload if image exists -->
    <label>Change Photo (Optional)</label>
    <input type="file" class="form-control" name="photo">

<?php
    }?>

</div>



<?php
  }?>

<div class="form-group">
    <label for="Session">Course Intake </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Intake</option>   
   <?php
  $sql_intake = mysqli_query($con, "select * from course_intake");
  while ($row_intake = mysqli_fetch_array($sql_intake)) {
?>
<option value="<?php echo htmlentities($row_intake['intake_date']); ?>">
    <?php echo htmlentities($row_intake['intake_date']); ?>
</option>
<?php
  }

?>
    </select> 
  </div> 

<div class="form-group">
    <label for="Department">Department  </label>
    <select class="form-control" name="department" id="department" onChange="getCourse(this.value);" required="required">
   <option value="">Select Department</option>   
   <?php
  $sql_dept = mysqli_query($con, "select * from department");
  while ($row_dept = mysqli_fetch_array($sql_dept)) {
?>
<option value="<?php echo htmlentities($row_dept['id']); ?>"><?php echo htmlentities($row_dept['department']); ?></option>
<?php
  }?>
    </select> 
  </div> 

<div class="form-group">
    <label for="Semester">Course Duration </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Duration</option>   
   <?php
  $sql_dur = mysqli_query($con, "select * from course_duration");
  while ($row_dur = mysqli_fetch_array($sql_dur)) {
?>
<option value="<?php echo htmlentities($row_dur['semester']); ?>"><?php echo htmlentities($row_dur['semester']); ?></option>
<?php
  }?>
    </select> 
  </div>

<div class="form-group">
    <label for="Course">Course  </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <option value="">Select Course</option>   
    </select> 
    <span id="course-availability-status1" style="font-size:12px;"></span>
  </div>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>
        </div>
    </div>
  <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function getCourse(val) {
    $.ajax({
        type: "POST",
        url: "get_course.php",
        data:'rid='+val,
        success: function(data){
            $("#course").html(data);
        }
    });
}

function courseAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'cid='+$("#course").val(),
        type: "POST",
        success:function(data){
            $("#course-availability-status1").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}
</script>
</body>
</html>
<?php
}?>
