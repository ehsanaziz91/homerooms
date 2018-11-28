<?php
include('../Connections/connection.php');
//session_start();

if(isset($_GET['studid']))
{
    $id = $_GET['studid'];
    
    $stmt = $conn->prepare("SELECT studentID FROM student WHERE studentID=? LIMIT 1");
    $stmt->bind_param('s', $studid);
    $stmt->execute();
    $stmt->bind_result($studid);
    $stmt->store_result();
    
    if(isset($_POST['studid']))
    {
        $studid = $_POST['studid'];

        $stmt = $conn->prepare("SELECT recoAnswer FROM student WHERE recoAnswer=? LIMIT 1");
        //$stmt2 = $conn->prepare("SELECT studentID FROM staff WHERE staffID=? LIMIT 1");
        $stmt->bind_param('s', $studid);
        $stmt->execute();
        $stmt->bind_result($studid);
        $stmt->store_result();

        if($stmt->num_rows == 1)  //To check if the row exists
        {
            while($stmt->fetch()) //fetching the contents of the row
            {
                //$_SESSION['Logged'] = 1;
                //$_SESSION['staffid'] = $id;
                //header("Location: ../production/index.php?staffid=$id");
                //<script>$("#").load("Location: ../production/index.php?userid=$userid")</script>
                echo 'Success!';
                exit();
            }

        }
        else
        {
            print "<script type=\"text/javascript\">";
            print "alert('You must answer the security question correctly to reset your new password.')";
            print "</script>";
        }
    }
}
?>