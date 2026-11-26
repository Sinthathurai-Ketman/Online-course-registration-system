<?php
include('onlinecourse/includes/config.php');

$sregno = 'SEU/IS/21/BS/087'; // From diagnose_result.txt
$cid = 'CSE101'; // From diagnose_result.txt

$query = "SELECT 
    course.courseName AS courname,
    course.courseCode AS ccode,
    course_intake.id as intake_id,
    course_intake.session AS session_year,
    course_intake.intake_date AS session_date,
    department.department AS dept,
    courseenrolls.enrollDate AS edate,
    course_duration.id as duration_id,
    course_duration.semester AS sem,
    students.studentName AS studentname,
    students.studentPhoto AS photo,
    courseenrolls.session as enroll_session,
    courseenrolls.semester as enroll_semester
FROM courseenrolls 
JOIN course ON course.courseCode = courseenrolls.course 
JOIN course_intake ON (course_intake.intake_date = courseenrolls.session OR course_intake.session = courseenrolls.session)
JOIN department ON department.id = courseenrolls.department 
JOIN students ON students.StudentRegno = courseenrolls.studentRegno 
JOIN course_duration ON course_duration.semester = courseenrolls.semester 
WHERE courseenrolls.studentRegno='$sregno' 
AND courseenrolls.course='$cid'";

$res = mysqli_query($con, $query);
$results = [];
while ($row = mysqli_fetch_assoc($res)) {
    $results[] = $row;
}
file_put_contents('debug_results.json', json_encode($results, JSON_PRETTY_PRINT));
echo "Results saved to debug_results.json\n";
?>
