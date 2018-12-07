<?php
include('../Connections/connection.php');

/*$userid = $_POST['staffID'];

$stmt1 = $conn->prepare("SELECT student.studentID, student.studName, SUM(record.meritPoint) as meritPoint, SUM(record.demeritPoint) as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)) as currentPoint, homeroom.staffID FROM student LEFT OUTER JOIN record ON record.studID = student.studID JOIN homeroom ON homeroom.hrID = student.hrID WHERE homeroom.staffID = ? GROUP BY studentID");
$stmt1->bind_param('s', $userid);
$stmt1->execute();
$stmt1 -> bind_result($studid, $studname, $mpoint, $dpoint, $cpoint, $userid);
$stmt1->fetch();*/

//delete student
if (isset($_POST['del']))
{
    $studid = $_GET['studid'];
    
    $stmt = $conn->prepare("DELETE FROM `student` WHERE studentID = ?");
    $stmt->bind_param('s', $studid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='admin_studListPage.php?userid=$userid'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>