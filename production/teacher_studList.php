<?php
include('../Connections/connection.php');
session_start();
{
    $userid = $_POST['studid'];
    $studname = $_POST['studname'];
    $studadd = $_POST['studadd'];
    $studno = $_POST['contc'];
    $parent = $_POST['parent'];
    $pass = $_POST['password'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];
    $hrname = $_POST['hrname'];

    $stmt = $conn->prepare("INSERT INTO `student` (studentID, studName, studAddress, studContcNo, parentName, password, recoQuestion, recoAnswer, hrName) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssss', $userid, $studname, $studadd, $studno, $parent, $pass, $questions, $answers, $hrname);
    $stmt->execute();
	//header('location:teacher_studListPage.php');
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered New Student!'),location.href='teacher_studListPage.php'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to register new Student!')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
};

//delete student
if (isset($_POST['del']))
{
    $userid = $_GET['studentID'];
    
    $stmt = $conn->prepare("DELETE FROM `student` WHERE studentID = ?");
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='teacher_studListPage.php'";
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