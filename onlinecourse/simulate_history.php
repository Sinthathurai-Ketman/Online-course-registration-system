<?php
include('includes/config.php');
$login = 'SEU/IS/21/BS/087';

$query = "select courseenrolls.course as cid, course.courseCode as ccode, course.courseName as courname,course_intake.session as session,department.department as dept,level.level as level,courseenrolls.enrollDate as edate ,course_duration.semester as sem from courseenrolls join course on course.courseCode=courseenrolls.course join course_intake on course_intake.id=courseenrolls.session join department on department.id=courseenrolls.department join level on level.id=courseenrolls.level  join course_duration on course_duration.id=courseenrolls.semester  where courseenrolls.studentRegno='$login'";

$res = mysqli_query($con, $query);
if (!$res) {
    echo "QUERY FAILED: " . mysqli_error($con) . "\n";
}
else {
    echo "Rows found: " . mysqli_num_rows($res) . "\n";
    while ($row = mysqli_fetch_assoc($res)) {
        print_r($row);
    }
}
?>
