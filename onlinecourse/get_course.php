<?php
include('includes/config.php');
if (!empty($_POST["rid"])) {
    $rid = $_POST["rid"];
    $sql = mysqli_query($con, "SELECT * FROM course WHERE departmentId='$rid'");
?>
<option value="">Select Course</option>
<?php
    while ($row = mysqli_fetch_array($sql)) {
?>
<option value="<?php echo htmlentities($row['courseCode']); ?>"><?php echo htmlentities($row['courseName']); ?></option>
<?php
    }
}
?>
