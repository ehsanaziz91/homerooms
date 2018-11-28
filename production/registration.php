<?php
include('../Connections/connection.php');

if(isset($_POST['submit']))
{
    $userid = $_POST['staffid'];
    $name = $_POST['fullName'];
    $positions = $_POST['position'];
    $phone = $_POST['phoneNo'];
    $emails = $_POST['email'];
    $password = md5($_POST['pass']); //encrypt pass
    $questions = $_POST['question'];
    $answers = $_POST['answer'];

    $stmt = $conn->prepare("INSERT INTO `staff` (staffID, staffName, position, phoneNo, email, password, recoQuestion, recoAnswer) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $userid, $name, $positions, $phone, $emails, $password, $questions, $answers);
    $stmt->execute();

    if ($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered !'),location.href='loginPage.php'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Problem Occured !')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
}    

?>