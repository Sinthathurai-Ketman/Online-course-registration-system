<?php
include('includes/config.php');
// Test with both session formats
$test_regno = 'SEU/IS/21/PS/071';
$test_course = 'CSE104';

$sql = "SELECT 
        course.courseName AS courname,
        course.courseCode AS ccode,
        course_intake.intake_date AS session,
        department.department AS dept,
        courseenrolls.enrollDate AS edate,
        course_duration.semester AS sem,
        students.studentName AS studentname,
        students.studentPhoto AS photo,
        students.creationdate AS studentregdate 
    FROM courseenrolls 
    JOIN course ON course.courseCode = courseenrolls.course 
    JOIN course_intake ON (course_intake.intake_date = courseenrolls.session OR course_intake.session = courseenrolls.session)
    JOIN department ON department.id = courseenrolls.department 
    JOIN students ON students.StudentRegno = courseenrolls.studentRegno 
    JOIN course_duration ON course_duration.semester = courseenrolls.semester 
    WHERE courseenrolls.studentRegno='$test_regno' 
    AND courseenrolls.course='$test_course'";

$res = mysqli_query($con, $sql);
if ($res) {
    if ($row = mysqli_fetch_assoc($res)) {
        echo "SUCCESS: Query returned data!\n";
        print_r($row);
    }
    else {
        echo "FAILURE: No rows returned.\n";
    }
}
else {
    echo "ERROR: Query failed: " . mysqli_error($con) . "\n";
}
?>
