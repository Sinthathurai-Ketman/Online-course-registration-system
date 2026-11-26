<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) 
{




    
header('location:index.php');
}
else {

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration Report</title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
<?php $cid = $_GET['id'];
    $sql = mysqli_query($con, "SELECT 
        course.courseName AS courname,
        course.courseCode AS ccode,
        course_intake.session AS session_year,
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
    WHERE courseenrolls.studentRegno='" . $_SESSION['login'] . "' 
    AND courseenrolls.course='$cid'
    GROUP BY courseenrolls.id");
    while ($row = mysqli_fetch_array($sql)) 
{ ?>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                  <img src="studentphoto/<?php echo htmlentities($row['photo']); ?>" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Enrollment Date: <?php echo htmlentities($row['edate']); ?><br>
                                Student Name:  <?php echo htmlentities($row['studentname']); ?><br>
                                 Reg No:  <?php echo htmlentities($_SESSION['login']); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Faculty of Applied Sciences<br>
                                External Courses<br>
                                Online Registration System
                            </td>
                            
                            <td>
                                <?php echo htmlentities($row['studentname']); ?><br>
                                <?php echo htmlentities($_SESSION['login']); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Course Details
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Course Code
                </td>
                
                <td>
                    <?php echo htmlentities($row['ccode']); ?>
                </td>
            </tr>

            <tr class="details">
                <td>
                    Course Name
                </td>
                
                <td>
                    <?php echo htmlentities($row['courname']); ?>
                </td>
            </tr>

            <tr class="details">
                <td>
                    Intake
                </td>
                
                <td>
                    <?php echo htmlentities($row['session']); ?>
                </td>
            </tr>

            <tr class="details">
                <td>
                    Department
                </td>
                
                <td>
                    <?php echo htmlentities($row['dept']); ?>
                </td>
            </tr>

            <tr class="details">
                <td>
                    Duration
                </td>
                
                <td>
                    <?php echo htmlentities($row['sem']); ?>
                </td>
            </tr>
            
            
        </table>
<?php
    }?>
    </div>
</body>
</html>
<?php
}?>