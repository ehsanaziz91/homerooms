<?php
include('../Connections/connection.php');

if (isset($_POST['submit']))
{

    $userid = $_POST['userid'];
    $answer = $_POST["answer"];

    $stmt2 = $conn->prepare("SELECT * FROM staff WHERE staffID= ?");
    $stmt2->bind_param('s',$userid);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();

    $question = $row2['recoQuestion'];

    $stmt = $conn->prepare("SELECT * FROM `staff` WHERE staffID=? AND recoQuestion=? AND recoAnswer=?");
    $stmt->bind_param('sss', $userid, $question, $answer);
    $stmt->execute();
    $result = $stmt->get_result();   
    if($result->num_rows == 1) 
    {  
        header("Location:resetPassPage.php?staffid=$userid");
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('You must answer the security question correctly to reset your new password.')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>