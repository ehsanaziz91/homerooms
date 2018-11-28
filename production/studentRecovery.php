<?php
include('../Connections/connection.php');
session_start();

if(isset($_GET['studid']))
{
    $id = $_GET['studid'];
    
    $stmt = $conn->prepare("SELECT studentID FROM student WHERE studentID=? LIMIT 1");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    
    if($stmt->num_rows == 1)  //To check if the row exists
    {
        while($stmt->fetch()) //fetching the contents of the row
        {
            $_SESSION['Logged'] = 1;
            $_SESSION['studid'] = $id;
            header("Location: ../production/studentRecoAnswerPage.php?studid=$id");
            //<script>$("#").load("Location: ../production/index.php?userid=$userid")</script>
            //echo 'Success!';
            exit();
        }

    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Student ID not found, please try again.'),location.href='recoveryPage.php'";
        print "</script>";
    }
    $stmt->close();
}
$conn->close();
?>