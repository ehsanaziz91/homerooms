<?php
include('../Connections/connection.php');

if(isset($_GET['staffid']))
{
    $userid = $_GET['staffid'];
    
    $stmt = $conn->prepare("SELECT staffID FROM staff WHERE staffID=? LIMIT 1");
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $stmt->bind_result($userid);
    $stmt->store_result();
    
    if($stmt->num_rows == 1)  //To check if the row exists
    {
        while($stmt->fetch()) //fetching the contents of the row
        {
            $_SESSION['Logged'] = 1;
            $_SESSION['staffid'] = $userid;
            header("Location: ../production/recoAnswerPage.php?staffid=$userid");
            //<script>$("#").load("Location: ../production/index.php?userid=$userid")</script>
            //echo 'Success!';
            exit();
        }

    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Staff ID not found, please try again.'),location.href='recoveryPage.php'";
        print "</script>";
    }
    $stmt->close();
}
$conn->close();
?>